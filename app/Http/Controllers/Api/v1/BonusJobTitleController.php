<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bonus\BonusJobTitleResource;
use App\Http\Resources\Bonus\BonusJobTitleResourceCollection;
use App\Http\Resources\PagesResourceCollection;
use App\Http\Resources\PaginatedResourceCollection;
use App\Models\BonusJobTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BonusJobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = BonusJobTitle::orderBy('id', 'desc');
        if (!$request->isNotFilled('bonusDegreeId') && $request->bonusDegreeId != 0) {
            $data = $data->where('bonus_degree_id', $request->bonusDegreeId);
        }
        $data = $data->get();
        return $this->ok(BonusJobTitleResource::collection($data));
    }
    public function filter(Request $request)
    {
        $request->filled('limit') ? $limit = $request->limit : $limit = 10;

        $data = BonusJobTitle::orderBy('id', 'desc');

        if (!$request->isNotFilled('name') && $request->name != '') {
            $data = $data->where('name', 'like', '%' . $request->name . '%');
        }
        if (!$request->isNotFilled('bonusDegreeId') && $request->bonusDegreeId != 0) {
            $data = $data->where('bonus_degree_id', $request->bonusDegreeId);
        }
        $data = $data->paginate($limit);
        // return $data;
        if (empty($data) || $data == null) {
            return $this->error(__('general.loadFailed'));
        } else {
            //return $this->ok(new BonusJobTitleResourceCollection( $data));
            return $this->ok(new PaginatedResourceCollection($data, BonusJobTitleResource::class));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bonusDegreeId' => 'required|integer|exists:bonus_degrees,id',
            'description' => 'nullable|string',
        ]);

        $bonusJobTitle = BonusJobTitle::create($validatedData);
        return $this->ok(new BonusJobTitleResource($bonusJobTitle));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bonusJobTitle = BonusJobTitle::find($id);
        return $this->ok(new BonusJobTitleResource($bonusJobTitle));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bonusDegreeId' => 'required|integer|exists:bonus_degrees,id',
            'description' => 'nullable|string',
        ]);

        $bonusJobTitle = BonusJobTitle::find($id);
        $bonusJobTitle->update($validatedData);
        return $this->ok(new BonusJobTitleResource($bonusJobTitle));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bonusJobTitle = BonusJobTitle::find($id);
        $bonusJobTitle->delete();
        return $this->ok(['message' => 'BonusJobTitle deleted successfully']);
    }
}
