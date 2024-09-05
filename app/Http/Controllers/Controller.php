<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function ok($data)
    {
        return response()->json([
            'message' => 'Successful',
            'data' => $data,
        ], status: 200);
    }
    public function ok_paginate($data)
    {
        // return $data;
        return response()->json([
            'message' => 'Successful',
            'data' => $data,
            'links' => [
                'self' => $data->resource->url($data->resource->currentPage()),
                'first' => $data->resource->url(1),
                'last' => $data->resource->url($data->resource->lastPage()),
                'prev' => $data->resource->previousPageUrl(),
                'next' => $data->resource->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $data->resource->currentPage(),
                'from' => $data->resource->firstItem(),
                'to' => $data->resource->lastItem(),
                'per_page' => $data->resource->perPage(),
                'total' => $data->resource->total(),
                'last_page' => $data->resource->lastPage(),
            ],
        ], status: 200);
    }


    public function FailedResponse($message = '', $data = null, $status = 500)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], status: $status);
    }
}
