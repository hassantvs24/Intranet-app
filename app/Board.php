<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['name', 'group_id'];

    public function cards()
    {
        return $this->hasMany('App\Card');
    }
}
