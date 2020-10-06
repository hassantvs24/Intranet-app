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

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function scopeActive($query, $value )
    {
        return $query->where('status', $value );
    }
}
