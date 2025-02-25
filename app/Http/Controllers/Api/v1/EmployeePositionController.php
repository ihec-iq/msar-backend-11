<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employee\EmployeePositionResource;
use App\Http\Resources\GeneralIdNameResource;
use App\Models\EmployeePosition;
use Illuminate\Http\Request;

class EmployeePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EmployeePositionResource::collection(EmployeePosition::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = EmployeePosition::create([
            'name' => $request->name,
            'code' => $request->code ?? '',
            'level' => $request->level ?? '',
        ]);
        return $this->ok(new GeneralIdNameResource($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->ok(new GeneralIdNameResource(EmployeePosition::find($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = EmployeePosition::find($id);
        $data->name = $request->name;
        $data->code = $request->code ?? ''; 
        $data->level = $request->level ?? ''; 

        $data->save();
        return $this->ok(new GeneralIdNameResource($data));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = EmployeePosition::find($id);
        $data->delete();
        return $this->ok(new GeneralIdNameResource($data));
    }
}
