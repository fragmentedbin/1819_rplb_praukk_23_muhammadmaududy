<?php

namespace App\Policies;

use App\{User, Level};
use Illuminate\Auth\Access\HandlesAuthorization;

class InventarisPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function inventaris_add(User $user)
    {
        dd($user);
        // $user->id_level === 1;
        // $user->id_level == 2;
    }
}   
