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

    public function users()
    {
        return $this->belongsTo('App\User','users_id');
    }

    public function groupsAdmin()
    {
        return $this->hasMany('App\GroupGroupAdmin', 'group_admin_id');
    }

    public function is_group($group_id){ // Verify as a group admin by group id
        $table = $this->groupsAdmin()->where('group_admin_id', $this->id)->where('group_id', $group_id)->count();
        if($table > 0){
            return true;
        }
        return false;
    }
}
