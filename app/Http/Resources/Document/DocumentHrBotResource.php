<?php

namespace App\Http\Resources\Document;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DocumentHrBotResource extends JsonResource
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
            //'path' => env('BOT_WEBHOOK_URL').Storage::url($this->path).'?'.rand(1, 999999999),
            //'path' => Storage::url($this->path).'?'.rand(1, 999999999),
            'path' => $this->path,
            'size' => $this->formatFileSize($this->size),
            'description' => $this->description,
            'extension' => $this->extension,
            'linkId' => $this->documentable_id,
        ];
    }

    public function formatFileSize($bytes)
    {
        $size = ['B', 'KB', 'MB', 'GB', 'TB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf('%.2f', $bytes / pow(1024, $factor)).' '.@$size[$factor];
    }
}
