<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    protected $fillable = [ 'name' , 'phone', 'email', 'password' , 'address'];


   
  


}//end of model
