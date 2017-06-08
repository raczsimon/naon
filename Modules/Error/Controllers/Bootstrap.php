<?php
namespace Modules\Error\Controllers;

use Naon\Helpers\Middleware;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Bootstrap extends Middleware {
    
    public function init($e) {
        if ($e instanceof ResourceNotFoundException) {
            $controller = new E404();
            
            $controller->setReflect((object) [
                '_controller' => 'Modules:Error:Controllers:E404',
                'view' => '404'
            ]);
            
            $controller->init();
        }
    }
}