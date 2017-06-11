<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require ('vendor/autoload.php');

// Initilize a loader
$loader = new Nette\Loaders\RobotLoader;
$loader->addDirectory('Modules');
$loader->addDirectory('Themes');
$loader->addDirectory('Naon');

$loader->setTempDirectory('Naon/temp');
$loader->register();

// Handling the configuration files
$map = require('Naon/config.map.php');

foreach ($map as $key => $config) {
    $handler = new raczsimon\nfw\Config\Handler();
    $handler->set($config);
    $handler->parse();
    $GLOBALS[$key] = ($handler->get());
}

// Database configuration
if (isset($GLOBALS['main']->driver)) {
    $database = new Naon\Config\Database;
    $database->handle();
}

$database = new Naon\Config\Database;

return ConsoleRunner::createHelperSet($database->handle());