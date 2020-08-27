<?php

namespace App\Http\Controllers\API;

use App\Group as Group;


class GroupController extends BaseController
{
    public function show($id)
    {
        $group = Group::find($id);


        if (is_null($group)) {
            return $this->sendError('Groups not found.');
        }


        return $this->sendResponse($group->toArray(), 'Group retrieved successfully.');
    }

    public function contacts($id)
    {
        $group = Group::find($id);
        $contacts = $group->admins;


        if (is_null($contacts)) {
            return $this->sendError('contacts not found.');
        }


        return $this->sendResponse($contacts->toArray(), 'Contacts retrieved successfully.');
    }
}
