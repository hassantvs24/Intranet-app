<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupAdmin extends Model
{
    protected $fillable = [ 'name', 'e-mail', 'phone', 'avatar', 'bio','status', 'users_id' ];

    public function group()
    {
        return $this->belongsToMany('App\Group');
    }

    public function scopeActive($query, $value )
    {
        return $query->where('status', $value );
    }
}
