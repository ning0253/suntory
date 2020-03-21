<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liqueur extends Model
{
    protected $table = 'liqueurs';
    protected $fillable = [
        'id', 'name', 'sort'];

    public function imgs()
    {
        return $this->hasMany('App\Liqueurs_img','liqueurs_id','id')->orderBy('sort', 'desc');
    }
}
