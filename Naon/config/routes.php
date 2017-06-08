<?php
use Symfony\Component\Routing\Route;

return [
    'homepage' => new Route('/', array('_controller' => 'Modules:Articles:Controller:Homepage', 'view' => 'default'))
];