<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
     protected $table = 'orders';

     protected $fillable = [
          'user_id', 'products_list', 'totalprice'
     ];

     /**
      * The attributes excluded from the model's JSON form.
      *
      * @var array
      */
     protected $hidden = [

     ];

}
