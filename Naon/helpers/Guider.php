<?php
namespace Naon\Helpers;

/**
 * Guider for Naon type paths
 */
class Guider
{
    /**
     * Replace : by \\
     * @param string $route Route you want to compile
     * @return string Compiled route
     */
    public static function toPath($route)
    {
        return str_replace(':', '\\', $route);
    }
    
    /**
     * Gets folder path for Views based on Controller
     * @param string $path Path to Controller
     * @return void
     */
    public static function getViewFolderPath($path)
    {
        $guide = explode('\\', self::toPath($path));
        $guide = $guide[0] . '\\' . $guide[1] . '\\Views';
        return $guide;
    }
}