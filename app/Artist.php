<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
  public function actors() {
    return $this->hasMany('App\Actor');
  }

  public function directors() {
    return $this->hasMany('App\Director');
  }
}
