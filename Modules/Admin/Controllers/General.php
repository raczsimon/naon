<?php
namespace Modules\Admin\Controllers;

use Naon\Helpers\Middleware;
use Nette\Security\SimpleAuthenticator;
use Nette\Security\User;
use Naon\Helpers\MockUserStorage;

class General extends Middleware
{
    /**
     * Sandbox for Administration
     */
    public function init()
    {
        $user = new User(new MockUserStorage);
        $users = [
            'john' => 'password123!',
            'admin' => 'admin',
        ];
        $counter = (object) [
            'login' => 0,
            'logout' => 0,
        ];
        $user->onLoggedIn[] = function () use ($counter) {
            $counter->login++;
        };
        $user->onLoggedOut[] = function () use ($counter) {
            $counter->logout++;
        };
        $authenticator = new SimpleAuthenticator($users);
        $user->setAuthenticator($authenticator);

        $user->login('admin', 'admin');
        var_dump($user->getIdentity());
        echo 'Administrace';
    }
}