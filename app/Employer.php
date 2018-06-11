<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    public function user()
    {
        return $this->morphMany(User::class, 'user');
    }
}
