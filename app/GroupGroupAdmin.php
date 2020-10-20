<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupGroupAdmin extends Model
{
    protected $table = 'group_group_admin';
    protected $fillable = [ 'group_id', 'group_admin_id'];
}
