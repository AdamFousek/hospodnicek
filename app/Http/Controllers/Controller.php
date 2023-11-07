<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function getUser(): User
    {
        $user = Auth::user();
        if (! $user instanceof User) {
            abort(403);
        }

        return $user;
    }
}
