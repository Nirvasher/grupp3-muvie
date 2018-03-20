<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
  public function movies() {
    return $this->hasMany('App\Movie');
  }

  public function person() {
    return $this->belongsTo('App\Person');
  }
}
