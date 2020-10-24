<?php

namespace App\Observers;

use App\GroupAdmin;
use App\GroupGroupAdmin;
use App\User;

class AdminObserver
{
    /**
     * Handle the group admin "created" event.
     *
     * @param  \App\GroupAdmin  $groupAdmin
     * @return void
     */
    public function created(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Handle the group admin "updated" event.
     *
     * @param  \App\GroupAdmin  $groupAdmin
     * @return void
     */
    public function updated(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Handle the group admin "deleted" event.
     *
     * @param  \App\GroupAdmin  $groupAdmin
     * @return void
     */
    public function deleted(GroupAdmin $groupAdmin)
    {
        $user = User::find($groupAdmin->users_id);
        $user->role = 'user';
        $user->save();

        GroupGroupAdmin::where('group_admin_id',  $groupAdmin->id)->delete();
    }

    /**
     * Handle the group admin "restored" event.
     *
     * @param  \App\GroupAdmin  $groupAdmin
     * @return void
     */
    public function restored(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Handle the group admin "force deleted" event.
     *
     * @param  \App\GroupAdmin  $groupAdmin
     * @return void
     */
    public function forceDeleted(GroupAdmin $groupAdmin)
    {
        $user = User::find($groupAdmin->users_id);
        $user->role = 'user';
        $user->save();
        GroupGroupAdmin::where('group_admin_id',  $groupAdmin->id)->forceDelete();
    }
}
