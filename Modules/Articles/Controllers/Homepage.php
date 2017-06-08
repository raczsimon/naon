<?php
namespace Modules\Articles\Controller;

use Naon\Helpers\Middleware;

class Homepage extends Middleware
{
    public function init()
    {
        $this->callRegular();
    }
    
    public function renderDefault()
    {
        echo 'Ahoj, tady default!';
    }
}