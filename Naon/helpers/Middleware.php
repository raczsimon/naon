<?php
namespace Naon\Helpers;

use raczsimon\nfw\Environment\Controller;
use Naon\Helpers\Guider;

/**
 * A helper for module controllers
 */
class Middleware extends Controller
{
    protected $config;
    
    public function __construct()
    {
        $this->config = $GLOBALS['main'];
    }
    
    protected function render($view)
    {
        require (Guider::getViewFolderPath($this->reflect->_controller)). '\\' . $view . '.phtml';
    }
    
    protected function callRegular()
    {
        $this->callMethod('begin');
        $this->callMethod('action', $this->reflect->view);
        $this->callMethod('render', $this->reflect->view);
        $this->callMethod('end');
    }
    
    private function callMethod($name, $suffix = '')
    {
        $method = $name . ucfirst($suffix);
        if (method_exists($this, $method))
            $this->$method();
    }
}