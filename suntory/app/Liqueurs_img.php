<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liqueurs_img extends Model
{
    protected $table ='liqueurs__img';
    protected $fillable = [
        'id','liqueurs_id', 'img', 'sort'
    ];
}
