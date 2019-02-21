<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kudo extends Model
{
    protected $guarded = [];

    public function options() {
        return $this->belongsToMany(Option::class);
    }
}
