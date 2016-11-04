<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    protected $table = "lgas";
    protected $fillable = ['name', 'state_id', 'is_capital'];
    public $timestamps = false;
}
