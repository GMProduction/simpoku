<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class favoriteModel extends Model
{
    //
    protected $table = 'tb_favorite';
    protected $fillable = ['id','idUser','idEvent'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}
