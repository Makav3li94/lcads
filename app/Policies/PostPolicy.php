<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function viewAny()
    {
        return True;
    }


    public function view()
    {
        return True;
    }

    public function create(User $user)
    {
        return $user->check();

    }

    public function update(User $user, Post $post)
    {
        if ($user->check() == 1) {
            return TRUE;
        }
    }


    public function delete(User $user, Post $post)
    {
        return $user->check();
    }


}
