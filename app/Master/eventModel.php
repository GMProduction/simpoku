<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class eventModel extends Model
{
    //
    protected $table = 'tb_event';
    protected $fillable = ['judul', 'deskripsi', 'tempat', 'region', 'tglMulai', 'tglAkhir', 'contact', 'spec', 'gambar', 'filepdf'];
}
