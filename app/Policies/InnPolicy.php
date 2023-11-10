<?php

namespace App\Policies;

use App\Models\Inn\Inn;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InnPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Inn $inn): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inn $inn): Response
    {
        if ($inn->user_id === $user->id) {
            return Response::allow();
        }

        return Response::deny('You do not own this inn.', 405);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inn $inn): Response
    {
        if ($inn->user_id === $user->id) {
            return Response::allow();
        }

        return Response::deny('You do not own this inn.', 405);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Inn $inn): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Inn $inn): bool
    {
        return false;
    }
}
