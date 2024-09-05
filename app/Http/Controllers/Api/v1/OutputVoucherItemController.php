<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Voucher\OutputVoucherItemResource;
use App\Models\OutputVoucherItem;
use Illuminate\Http\Request;

class OutputVoucherItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getItems(Request $request)
    {
        $data = OutputVoucherItem::whereIn('id', $request->ids);

        return $this->ok(OutputVoucherItemResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OutputVoucherItem $outputVoucherItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OutputVoucherItem $outputVoucherItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = OutputVoucherItem::find($id);
        $data->delete();

        return $this->ok(null);
    }
}
