<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;


class BannerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image_url' => $this->imageUrl(),
            'link' => $this->link,
            'order' => $this->order,
            'is_active' => (bool) $this->is_active,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
