<?php

namespace App\Observers;

use App\Board;
use App\Group;
use App\GroupGroupAdmin;
use App\InviteQueue;

class GroupObserver
{
    /**
     * Handle the group "created" event.
     *
     * @param  \App\Group  $group
     * @return void
     */
    public function created(Group $group)
    {
        //
    }

    /**
     * Handle the group "updated" event.
     *
     * @param  \App\Group  $group
     * @return void
     */
    public function updated(Group $group)
    {
        //
    }

    /**
     * Handle the group "deleted" event.
     *
     * @param  \App\Group  $group
     * @return void
     */
    public function deleted(Group $group)
    {
        GroupGroupAdmin::where('group_id',  $group->id)->delete();
        Board::where('group_id',  $group->id)->delete();
        InviteQueue::where('group_id',  $group->id)->delete();
    }

    /**
     * Handle the group "restored" event.
     *
     * @param  \App\Group  $group
     * @return void
     */
    public function restored(Group $group)
    {
        //
    }

    /**
     * Handle the group "force deleted" event.
     *
     * @param  \App\Group  $group
     * @return void
     */
    public function forceDeleted(Group $group)
    {
        GroupGroupAdmin::where('group_id',  $group->id)->forceDelete();
        Board::where('group_id',  $group->id)->forceDelete();
        InviteQueue::where('group_id',  $group->id)->forceDelete();
    }
}
