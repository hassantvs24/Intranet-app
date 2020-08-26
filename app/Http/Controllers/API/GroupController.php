<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group as Group;

class GroupController extends BaseController
{
    public function show($id)
    {
        $group = Group::find($id);


        if (is_null($group)) {
            return $this->sendError('Product not found.');
        }


        return $this->sendResponse($group->toArray(), 'Group retrieved successfully.');
    }
}
