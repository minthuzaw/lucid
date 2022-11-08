<?php

namespace App\Services\Auth\Http\Controllers;

use App\Services\Auth\Features\LoginFeature;
use Lucid\Units\Controller;

class AuthController extends Controller
{
    /**
     * Login
     *
     * @group Api Auth
     * @unauthenticated
     *
     * @bodyParam email string required The email of the user. Example: superadmin@onenex.co
     * @bodyParam password string required The password of the user. Example: password
     */
    public function login()
    {
        return $this->serve(LoginFeature::class);
    }
}
