<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class specModel extends Model
{
    protected $table = 'tb_spec';
    protected $fillable = ['gelar','spec'];
 
}
