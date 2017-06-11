<?php
namespace Modules\Admin\Controllers;

use Nette;
use Naon\Entity;
use Naon\Helpers\Middleware;
use Naon\Helpers\Security;

class General extends Middleware
{
    public $em;
    
    /**
     * Sandbox for Administration
     */
    public function init()
    {
        $user = Security::setUser();
        $user->login('admin', 'admin');
    }
}