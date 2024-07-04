<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'original_title' => $this->original_title,
            'custom_title' => $this->custom_title,
            'path' => $this->path,
            'extension' => $this->extension,
            'size' => $this->size,
        ];
    }
}
