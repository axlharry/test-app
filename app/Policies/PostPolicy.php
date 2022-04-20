<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
 * Perform pre-authorization checks.
 *
 * @param  \App\Models\User  $user
 * @param  string  $ability
 * @return void|bool
 */
public function before(User $user, $ability)
{
    if ($user->is_admin) {
        return true;
    }
}

    /**
     * Determine whether the user can edit posts.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return bool
     */
    public function edit(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can update postss.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

        /**
     * Determine whether the user can delete posts.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return bool
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
