<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liqueurs_story extends Model
{
    protected $table ='liqueurs_stroy';
    protected $fillable = [
        'id','liqueur_id', 'img','content','title', 'sort'
    ];
    public function name()
    {
        return $this->belongsTo('App\Liqueur','liqueur_id','id')->orderBy('sort', 'desc');
    }
}
