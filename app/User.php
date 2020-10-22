<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'bio', 'group_id', 'role', 'primary_contact'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guard = [
        'role'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cards() {
        return $this->hasManyThrough(
            'App\Card',
            'App\Board',
            'group_id', // Foreign key on Cards table...
            'board_id', // Foreign key on board table...
            'group_id', // Local key on Users table...
            'id' // Local key on board table...
        );
    }

    public function group()
    {
        return $this->belongsTo('App\Group','group_id');
    }

    public function get_admin(){
        $admin = GroupAdmin::select('name', 'email', 'phone', 'avatar')->where('users_id', $this->id)->first();

        return $admin;
    }
}
