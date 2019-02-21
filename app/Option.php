<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];

    public function kudos() {
        return $this->belongsToMany(Kudo::class);
    }
}
