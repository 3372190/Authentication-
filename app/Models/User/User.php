<?php

namespace Auth\User;

use illuminate\Database\Eloquent\Model as Eloquent;
/**
 *
 */
class User extends Eloquent
{
    protected $table = 'user';
    protected $fillable = [
      'email',
      'username',
      'password',
      'active',
      'active_hash',
      'remember_identifier',
      'remember_token',
    ];
}
