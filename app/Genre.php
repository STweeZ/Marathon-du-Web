<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    // A serie has many genres
    public function series() {
        return $this->belongsToMany("App\Serie");
    }

}
