<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class CarouselModel extends Model
{
    protected $table = 'tb_slide';
    protected $fillable = ['id','judul','gambar','terlihat','deskripsi','url'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
