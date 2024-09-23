<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bonus\BonusStoreRequest;
use App\Http\Resources\Bonuses\BonusesResourceCollection;
use App\Http\Resources\Bonuses\BonusResource;
use App\Http\Resources\Bonuses\BonusResourceCollection;
use App\Models\Bonuses;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bonuses::all();
        return $this->ok(BonusResource::collection($data));
    }

    public function filter(Request $request)
    {
        $request->filled('limit') ? $limit = $request->limit : $limit = 10;

        $data = Bonuses::orderBy('id', 'desc');
        $data = $data->whereRelation('Employee', 'is_person', '=', true);

        if (!$request->isNotFilled('employeeName') && $request->employeeName != '') {
            $data = $data->whereRelation('Employee', 'name', 'like', '%' . $request->employeeName . '%');
        }
        if (!$request->isNotFilled('record') && $request->record != '') {
            $data = $data->orWhere('record', 'like', '%' . $request->record . '%');
        }


        // if (! $request->isNotFilled('issueDateFrom') && $request->issueDateFrom != '') {
        //     $data = $data->where('day_from', '>=', $request->issueDateFrom, 'and', 'date', '<=', $request->issueDateTo);
        // }
        $data = $data->paginate($limit);
        if (empty($data) || $data == null) {
            return $this->FailedResponse(__('general.loadFailed'));
        } else {
            return $this->ok(new  BonusResourceCollection($data));
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BonusStoreRequest $request)
    {
        //return $request->all();
        try {
            $data = Bonuses::create($request->validated());
            return $this->ok(new BonusResource($data));
        } catch (\Exception $e) {
            return $this->FailedResponse(__('general.saveFailed'), $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BonusStoreRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
