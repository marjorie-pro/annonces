<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
   protected $fillable = [
     'title',
     'description',
     'image',
     'price',
    ];
}
