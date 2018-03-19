<?php

namespace App\Policies;

use App\User;
use App\Issue;
use Illuminate\Auth\Access\HandlesAuthorization;

class IssuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function view(User $user, Issue $issue)
    {
        return $user->organisation_id === $issue->organisation_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create issues.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function update(User $user, Issue $issue)
    {
        $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function delete(User $user, Issue $issue)
    {
        $user->hasRole('admin');
    }
}
