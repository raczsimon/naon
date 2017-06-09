<?php
namespace Naon\Helpers;

use raczsimon\nfw\Environment\Controller;
use Naon\Helpers\Guider;

/**
 * A helper for module controllers
 */
class Middleware extends Controller
{
    /**
     * Configuration
     */
    protected $config;
    
    public function __construct()
    {
        $this->config = $GLOBALS['main'];
    }
    
    /**
     * Render view
     * @param string View name
     * @return void
     */
    protected function render($view)
    {
        require (Guider::getViewFolderPath($this->reflect->_controller)). '\\' . $view . '.phtml';
    }
    
    /**
     * Call regular methods for controllers
     * @return void
     */
    protected function callRegular()
    {
        $this->callMethod('begin');
        $this->callMethod('action', $this->reflect->view);
        $this->callMethod('render', $this->reflect->view);
        $this->callMethod('end');
    }
        /**
         * A function for callRegular()
         * Calls a method if exists
         * @param string $name Method name
         * @param string $suffix Suffix
         * @return void
         */
        private function callMethod($name, $suffix = '')
        {
            $method = $name . ucfirst($suffix);
            if (method_exists($this, $method))
                $this->$method();
        }
}