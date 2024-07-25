<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JourneyResource extends JsonResource
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
            'origin' => $this->origin,
            'destiny' => $this->destiny,
            'taxi' => $this->taxi->plate_number,
            'start' => $this->start_datetime,
            'end' => $this->end_datetime,
        ];
    }
}
