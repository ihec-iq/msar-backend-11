<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employee\EmployeeCenterResource;
use App\Http\Resources\GeneralIdNameResource;
use App\Models\EmployeeCenter;
use Illuminate\Http\Request;

class EmployeeCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EmployeeCenterResource::collection(EmployeeCenter::get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = EmployeeCenter::create([
            'name' => $request->name,
            'code' => $request->code ?? '',
        ]);
        return $this->ok(new GeneralIdNameResource($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->ok(new GeneralIdNameResource(EmployeeCenter::find($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = EmployeeCenter::find($id);
        $data->name = $request->name;
        $data->save();
        return $this->ok(new GeneralIdNameResource($data));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = EmployeeCenter::find($id);
        $data->delete();
        return $this->ok(new GeneralIdNameResource($data));
    }
}
