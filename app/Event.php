<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'details',
        'start',
        'end',
        'board_id'
    ];
}
