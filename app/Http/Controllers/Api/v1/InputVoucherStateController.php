<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralIdNameResource;
use App\Models\InputVoucherState;
use Illuminate\Http\Request;

class InputVoucherStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->ok(GeneralIdNameResource::collection(InputVoucherState::all()));
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
    public function show(string $id)
    {
        return $this->ok(new GeneralIdNameResource(InputVoucherState::find($id)));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
