<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $fillable = ["name", "first_term", "second_term", "third_term", "status"];

    public function term(){
        $active = "No term is active";

        if(!is_null($this) ){

            if($this->first_term === 'active'){
                $active = "first";
            }elseif($this->second_term === 'active'){
                $active = "second";
            }elseif($this->third_term === 'active'){
                $active = "third";
            }

        }

        return $active;
    }
}
