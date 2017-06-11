<?php
namespace Naon\Helpers;

class Security
{
    public static function setUser()
    {
        $user = new Nette\Security\User(new UserStorage);
        
        $auth = $GLOBALS['main']->app['authenticator'];
        $handler = new $auth;
        $user->setAuthenticator($handler);
        
        return $user;
    }
}