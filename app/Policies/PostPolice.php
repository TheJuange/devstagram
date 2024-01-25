<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolice
{

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
