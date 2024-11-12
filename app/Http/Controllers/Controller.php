<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Return successful response with data
     *
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function ok($data)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Successful',
            'length' => is_array($data) ? count($data) : ($data instanceof \Countable ? count($data) : 0),
            'data' => $data
        ], 200);
    }

    /**
     * Return error response
     * 
     * @param string $message
     * @param mixed $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message = '', $data = null, $status = 500) 
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Return paginated response
     *
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function okPaginate($data)
    {
        return response()->json([
            'status' => 'success',
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
        ], 200);
    }
}
