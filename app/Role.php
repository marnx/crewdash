<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

  /*Making the role available in other files*/
    //public function users(){
     // return $this->belongsToMany('App\User', 'name','role_user', 'role_id', 'user_id');
   // }

    protected $table = 'roles';
}
