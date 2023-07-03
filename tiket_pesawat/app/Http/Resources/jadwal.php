<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class jadwal extends JsonResource
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
            'id' => $this->id,
            'id_pesawat' => $this->id_pesawat,
            'kursi' => $this->kursi,
            'tanggal' => $this->tanggal,
            'harga' => $this->harga
        ];
    }
}
