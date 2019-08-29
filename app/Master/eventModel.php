<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class eventModel extends Model
{
    //
    protected $table = 'tb_event';
    protected $fillable = ['judul', 'deskripsi', 'tempat', 'region','city', 'tglMulai', 'tglAkhir', 'noContact','namaContact', 'spec', 'gambar', 'filepdf'];
}
