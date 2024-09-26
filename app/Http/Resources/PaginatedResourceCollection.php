<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\AbstractPaginator;

class PaginatedResourceCollection extends ResourceCollection
{
    protected $resourceClass;

    public function __construct($resource, $resourceClass)
    {
        $this->resourceClass = $resourceClass;
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        $resource = $this->resource;

        if (!$resource instanceof AbstractPaginator) {
            return [
                'data' => $this->resourceClass::collection($this->collection),
            ];
        }

        return [
            'data' => $this->resourceClass::collection($this->collection),
            'links' => [
                'self' => $resource->url($resource->currentPage()),
                'first' => $resource->url(1),
                'last' => $resource->url($resource->lastPage()),
                'prev' => $resource->previousPageUrl(),
                'next' => $resource->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $resource->currentPage(),
                'from' => $resource->firstItem(),
                'to' => $resource->lastItem(),
                'per_page' => $resource->perPage(),
                'total' => $resource->total(),
                'last_page' => $resource->lastPage(),
            ],
        ];
    }
}
