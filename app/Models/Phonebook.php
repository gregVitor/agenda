<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    protected $table = 'phonebook';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'phone', 'email', 'user_id'
    ];

    public function User()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
