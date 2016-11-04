<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * the attributes that are max assignable
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'roles';


    /**
     * Relationship between the users and roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('App\User');
    }


}
