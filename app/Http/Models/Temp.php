<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
   protected $table = 'temp';
  protected $fillable = ['baslik','veri','tip'];
}
