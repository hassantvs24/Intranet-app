<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
     /**
     * Get the group admins for the group.
     */
    public function admins()
    {
        return $this->belongsToMany('App\GroupAdmin', 'group_group_admin', 'group_id', 'group_admin_id');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
