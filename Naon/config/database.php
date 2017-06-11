<?php
namespace Naon\Config;

use Naon;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Database implements Naon\Database\IHandler
{
    public function handle()
    {
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/' . $GLOBALS['main']->database['entities']), $GLOBALS['main']->app['devmode']);

        $connectionOptions = array(
            'driver'   => $GLOBALS['main']->database['driver'],
            'host'     => $GLOBALS['main']->database['host'],
            'dbname'   => $GLOBALS['main']->database['dbname'],
            'user'     => $GLOBALS['main']->database['username'],
            'password' => $GLOBALS['main']->database['password']
        );

        return EntityManager::create($connectionOptions, $config);
    }
}