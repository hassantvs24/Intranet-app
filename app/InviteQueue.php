<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InviteQueue extends Model
{
    protected $fillable = ['group_id', 'primary_contact', 'name', 'email', 'status', 'creator_id', 'sender_id'];

    public function group()
    {
        return $this->belongsTo('App\Group','group_id');

    }

    public function p_contact()
    {
        return $this->belongsTo('App\User', 'primary_contact');
    }
}
