<?php
namespace Modules\Articles\Controllers;

use Naon\Helpers\Middleware;

class Homepage extends Middleware
{
    public function init()
    {
        echo 'Test';
    }
}