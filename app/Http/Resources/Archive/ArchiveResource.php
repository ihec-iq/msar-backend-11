<?php

namespace App\Http\Resources\Archive;

use App\Http\Resources\ArchiveType\ArchiveTypeResource;
use App\Http\Resources\Document\DocumentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArchiveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'way' => $this->way ? $this->way : "",
            'issueDate' => $this->issue_date,
            'sectionId' => $this->section_id,
            'ArchiveType' => new ArchiveTypeResource($this->ArchiveType),
            'number' => $this->number,
            'description' => $this->description,
            'isIn' => $this->is_in,
            'isInWord' => $this->is_in ? 'داخل' : 'خارج',
            'FilesDocument' => DocumentResource::collection($this->Documents),
        ];
    }
}
