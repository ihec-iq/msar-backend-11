<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Voucher\InputVoucherItemRequest;
use App\Http\Resources\Voucher\InputVoucherItemHistoryResource;
use App\Http\Resources\Voucher\InputVoucherItemResource;
use App\Http\Resources\Voucher\InputVoucherItemResourceCollection;
use App\Http\Resources\Voucher\InputVoucherItemVSelectResource;
use App\Models\InputVoucherItem;
use App\Models\ItemStoreView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InputVoucherItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return $this->ok(InputVoucherItemResource::collection(InputVoucherItem::all()));
    }

    /**
     * Display a Items For VSelect that show only available items.
     */
    public function getAvailableItemsVSelect($storeId = "0")
    {
        //region "OLD CODE"
        // $results = DB::table('input_voucher_items')
        //     ->select(
        //         'input_voucher_items.id as id',
        //         'items.name as itemName',
        //         'items.code as code',
        //         'items.description as ItemDescription',
        //         'input_voucher_items.description as description',
        //         'input_voucher_items.notes as notes',
        //         'input_voucher_items.price as price',
        //         'item_categories.name as itemCategoryName',
        //         'stocks.name as stockName',
        //         DB::raw('IFNULL(SUM(input_voucher_items.count),0) as inValue'),
        //         DB::raw('IFNULL(SUM(output_voucher_items.count),0) as outValue')
        //     )
        //     ->join('items', 'input_voucher_items.item_id', '=', 'items.id')
        //     ->join('item_categories', 'items.item_category_id', '=', 'item_categories.id')
        //     ->join('stocks', 'input_voucher_items.stock_id', '=', 'stocks.id')
        //     ->leftJoin('output_voucher_items', 'input_voucher_items.id', '=', 'output_voucher_items.input_voucher_item_id')
        //     ->groupBy([
        //         'input_voucher_items.id',
        //         'items.name',
        //         'items.code',
        //         'items.description',
        //         'input_voucher_items.description',
        //         'input_voucher_items.notes',
        //         'input_voucher_items.price',
        //         'item_categories.name',
        //         'stocks.name',
        //     ])
        //     ->having('inValue', '>', 0)
        //     ->get();
        //->toSql(); return $results;
        //endregion
        $results = ItemStoreView::whereRaw('inValue-outValue>0')
            ->select(
                'id',
                'itemId',
                'itemName',
                'code',
                'ItemDescription',
                'description',
                'notes',
                'price',
                'itemCategoryId',
                'itemCategoryName',
                'stockId',
                'stockName',
                'inValue',
                'outValue'
            );
        if ($storeId <> "0")
            $results = $results->whereRaw('stockId=' . $storeId);
        $results = $results->get();
        //Log::alert(print_r(InputVoucherItemVSelectResource::collection($results), true));
        return $this->ok(InputVoucherItemVSelectResource::collection($results));

    }
    public function getAllItemsVSelect($storeId = "0")
    {
        $results = ItemStoreView::whereRaw('inValue-outValue>0 || (outValue>0 && inValue)')
            ->select(
                'id',
                'itemId',
                'itemName',
                'code',
                'ItemDescription',
                'description',
                'notes',
                'price',
                'itemCategoryId',
                'itemCategoryName',
                'stockId',
                'stockName',
                'inValue',
                'outValue'
            );
        if ($storeId <> "0")
            $results = $results->whereRaw('stockId=' . $storeId);
        $results = $results->get();
        //Log::alert(print_r(InputVoucherItemVSelectResource::collection($results), true));
        return $this->ok(InputVoucherItemVSelectResource::collection($results));

    }

    public function filter(Request $request)
    {
        $filter_bill = [];
        $request->filled('limit') ? $limit = $request->limit : $limit = 10;

        if (!$request->isNotFilled('stockId') && $request->stockId != -1) {
            $filter_bill[] = ['stock_id', $request->stockId];
        }
        if (!$request->isNotFilled('itemId') && $request->itemId != -1) {
            $filter_bill[] = ['item_id', $request->itemId];
        }
        if (!$request->isNotFilled('description') && $request->description != '') {
            $filter_bill[] = ['description', 'like', '%' . $request->description . '%'];
        }
        if (!$request->isNotFilled('notes') && $request->notes != '') {
            $filter_bill[] = ['notes', 'like', '%' . $request->notes . '%'];
        }

        $data = InputVoucherItem::orderBy('id', 'desc')->where($filter_bill)->paginate($limit);
        if (empty($data) || $data == null) {
            return $this->FailedResponse(__('general.loadFailed'));
        } else {
            //return $this->ok($data);
            return $this->ok(new InputVoucherItemResourceCollection($data));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InputVoucherItemRequest $request)
    {
        $data = InputVoucherItem::create([
            'input_voucher_id' => $request->inputVoucherId,
            'item_id' => $request->itemId,
            'description' => $request->description,
            'count' => $request->count,
            'price' => $request->price * 100,
            'value' => $request->price * $request->count * 100,
            'notes' => $request->notes,
        ]);

        return $this->ok(new InputVoucherItemResource($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(InputVoucherItem $inputVoucherItem)
    {
        return $this->ok(new InputVoucherItemHistoryResource($inputVoucherItem));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InputVoucherItemRequest $request, InputVoucherItem $inputVoucherItem)
    {

        $inputVoucherItem->input_voucher_id = $request->inputVoucherId;
        $inputVoucherItem->item_id = $request->itemId;
        $inputVoucherItem->description = $request->description;
        $inputVoucherItem->count = $request->count;
        $inputVoucherItem->price = $request->price * 100;
        $inputVoucherItem->value = $request->price * $request->count * 100;
        $inputVoucherItem->notes = $request->notes;
        $inputVoucherItem->save();

        return $this->ok(new InputVoucherItemResource($inputVoucherItem));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InputVoucherItem::find($id);
        $data->delete();
        return $this->ok(null);
    }
}
