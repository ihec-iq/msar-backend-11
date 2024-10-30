<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotion\PromotionStoreRequest;
use App\Http\Resources\Promotion\PromotionResource;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return $this->ok(PromotionResource::collection($promotions));
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionStoreRequest $request)
    {
        $promotion = Promotion::create($request->validated());
        return $this->ok(new PromotionResource($promotion));
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        return $this->ok(new PromotionResource($promotion));
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(PromotionStoreRequest $request, Promotion $promotion)
    {
        $promotion->update($request->validated());
        return $this->ok(new PromotionResource($promotion));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return $this->ok(new PromotionResource($promotion));
    }
}
