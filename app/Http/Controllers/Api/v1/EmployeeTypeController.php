<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employee\EmployeeTypeResource;
use App\Http\Resources\GeneralIdNameResource;
use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeeTypeController extends Controller
{
    public function index()
    {
        return EmployeeTypeResource::collection(EmployeeType::get());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = EmployeeType::create([
            'name' => $request->name,
        ]);
        return $this->ok(new GeneralIdNameResource($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->ok(new GeneralIdNameResource(EmployeeType::find($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = EmployeeType::find($id);
        $data->name = $request->name;
        $data->save();
        return $this->ok(new GeneralIdNameResource($data));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = EmployeeType::find($id);
        $data->delete();
        return $this->ok(new GeneralIdNameResource($data));
    }


}
