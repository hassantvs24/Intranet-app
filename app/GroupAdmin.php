<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAdmin extends Model
{
    public function group()
    {
        return $this->belongsToMany('App\Group');
    }
}
