<?php

namespace App\Http\Resources;
use App\Models\Siswa;

use Illuminate\Http\Resources\Json\JsonResource;

class KendaraanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $nama_pemilik = Siswa::firstWhere('id',$this->siswaid);
         return [
            'id' => $this->id,
            'nama' => $this->nama,
            'pemilik'=> $nama_pemilik['nama'],
            'plat_nomor' => $this->plat_nomor,
        ];
    }
}
