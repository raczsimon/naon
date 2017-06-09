<?php
use Symfony\Component\Routing\Route;

return [
    'admin' => new Route(
        '/admin',
        array('_controller' => 'Modules:Admin:Controllers:General')
    ),
    'homepage' => new Route(
        '/', 
        array(
            '_controller' => 'Modules:Articles:Controllers:Homepage', 
            'view' => 'default')
        )
];