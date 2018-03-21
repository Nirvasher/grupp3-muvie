<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
  public function director() {
    return $this->belongsTo('App\Director');
  }

  public function actors() {
    return $this->belongsToMany('App\Actor');
  }

  public function genres() {
    return $this->belongsToMany('App\Genre');
  }

  public function image() {
    return $this->belongsTo('App\Image');
  }

  public function images() {
    return $this->hasMany('App\Image');
  }

  public function ratings() {
    return $this->hasMany('App\Rating');
  }
}
