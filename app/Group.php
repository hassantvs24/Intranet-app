<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [ 'name', 'color', 'start_date', 'end_date', 'archive_start_date', 'archive_end_date', 'status' ];
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

    public function boards()
    {
        return $this->hasOne( 'App\Board' );
    }

    public function scopeActive($query, $value )
    {
        return $query->where('status', $value );
    }
}
