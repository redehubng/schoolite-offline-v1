<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "states";
    protected $fillable = ['name', 'country_id', 'is_capital'];
    public $timestamps = false;

    public function lgas(){
        return $this->hasMany('App\Lga');
    }
}
