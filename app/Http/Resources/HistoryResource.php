<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'date' => $this['created_at'],
            'name' => $this['name'],
            'symbol' => $this['symbol'],
            'open' => $this['open'],
            'high' => $this['high'],
            'low' => $this['low'],
            'close' => $this['close']
        ];
    }
}