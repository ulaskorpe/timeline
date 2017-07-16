<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   protected $table = 'events';
  protected $fillable = ['start_date','end_date','text'];
}
