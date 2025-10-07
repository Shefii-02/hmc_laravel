<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends User
{
    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('staff', function ($query) {
            $query->where('account_type', 'staff');
        });
    }
}
