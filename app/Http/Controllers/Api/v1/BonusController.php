<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bonus\BonusStoreRequest;
use App\Http\Resources\Bonus\BonusResource;
use App\Http\Resources\Bonus\BonusResourceCollection;
use App\Http\Resources\GeneralIdNameResource;
use App\Http\Resources\Bonus\BonusDegreeStageResource;
use App\Models\Bonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bonus::all();
        return $this->ok(BonusResource::collection($data));
    }

    public function Bonus_study()
    {
        $data = \App\Models\BonusStudy::all();
        return $this->ok(GeneralIdNameResource::collection($data));
    }
    public function Bonus_degree_stage()
    {
        $data = \App\Models\BonusDegreeStage::all();
        return $this->ok(BonusDegreeStageResource::collection($data));
    }



    public function filter(Request $request)
    {
        $request->filled('limit') ? $limit = $request->limit : $limit = 10;

        $data = Bonus::orderBy('id', 'desc');
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
            return $this->ok(new BonusResourceCollection($data));
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BonusStoreRequest $request)
    {
        //return $request->all();
        try {
            $data = Bonus::create($request->validated());
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
        $bonus = Bonus::findOrFail($id);
        return $this->ok(new BonusResource($bonus));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BonusStoreRequest $request, string $id)
    {
        try {
            $bonus = Bonus::findOrFail($id);
            $bonus->update($request->validated());
            return $this->ok(new BonusResource($bonus));
        } catch (\Exception $e) {
            return $this->FailedResponse(__('general.saveFailed'), $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $bonus = Bonus::findOrFail($id);
            $bonus->delete();
            return $this->ok(['message' => 'Bonus deleted successfully']);
        } catch (\Exception $e) {
            return $this->FailedResponse(__('general.deleteFailed'), $e->getMessage());
        }
    }
}
