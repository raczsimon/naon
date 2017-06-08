<?php
namespace Modules\Error\Controllers;

use Naon\Helpers\Middleware;

class E404 extends Middleware {
    
    public function init() {
        $this->render('404');
    }
}