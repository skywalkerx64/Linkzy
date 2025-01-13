<?php

namespace App\Http\Resources\Link;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResource;

class LinkResource extends JsonResource
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
            'description' => $this->description,
            'original_url' => $this->original_url,
            'shortened_url' => $this->shortened_url,
            'visits' => $this->visits,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'favicon' => $this->favicon,
            'user' => new UserResource($this->whenLoaded('user')),
            'created_at' => $this->created_at?->format('d M. Y'),
            'updated_at' => $this->updated_at?->format(config('panel.datetime_format')),
        ];
    }
}
