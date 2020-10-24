<?php

namespace App\Observers;

use App\GroupAdmin;
use App\GroupUser;
use App\InviteQueue;
use App\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if($user->role == 'user'){
            GroupUser::firstOrCreate(['group_id' => $user->group_id, 'users_id' => $user->id], ['admin_id' => $user->primary_contact]);
            InviteQueue::where('email', $user->email)->update(['status' => 'Registered']);
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        InviteQueue::where('email', $user->email)->delete();
        GroupUser::where('users_id',  $user->id)->delete();
        GroupAdmin::where('users_id',  $user->id)->delete();
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        InviteQueue::where('email', $user->email)->delete();
        GroupUser::where('users_id',  $user->id)->forceDelete();
        GroupAdmin::where('users_id',  $user->id)->forceDelete();
    }
}
