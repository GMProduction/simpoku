<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class slideModel extends Model
{
    //
    protected $table = 'tb_slide';
    protected $fillable = ['idEvent','judul', 'gambar', 'terlihat', 'url', 'jenis'];
}
