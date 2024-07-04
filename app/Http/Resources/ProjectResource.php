<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'slug' => $this->slug,
            'published_at' => $this->published_at,
            'description' => $this->description,
            'thumb_path' => $this->thumb_path,
            'author_id' => $this->author_id,
            'amount' => $this->amount,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'tools' => ToolResource::collection($this->whenLoaded('tools')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
        ];
    }
}
