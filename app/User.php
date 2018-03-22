<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
      return $this->belongsToMany('App\Role');
    }

    /**
     * Method for checking if a user has a role or roles.
     *
     * @param  string $roles The role/s
     * @return boolean        Returns true or false.
     */
    public function authorizeRoles($roles) {
      if(is_array($roles)) {
        return $this->hasAnyRole($roles) || false;
      }
      return $this->hasRole($roles) || false;
    }

    /**
     * Checks if the user has any role.
     *
     * @param  string  $roles The roles
     * @return boolean        Returns true or false.
     */
    public function hasAnyRole($roles) {
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Checks if the user has a role.
     *
     * @param  string  $role The role
     * @return boolean       Returns true or false.
     */
    public function hasRole($role) {
      return null !== $this->roles()->where('name', $role)->first();
    }

    public function libraries() {
      return $this->hasMany('App\Library')->orderBy('format');
    }

    public function ratings() {
      return $this->hasMany('App\Rating');
    }
}
