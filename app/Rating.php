<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  public function movie() {
    return $this->belongsTo('App\Movie');
  }
}
