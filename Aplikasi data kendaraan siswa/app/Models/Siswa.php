<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    public $timestamps = false;
    protected $table = 'siswa';

     public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }


}
