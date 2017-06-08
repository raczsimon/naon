<?php
namespace Naon\Helpers;

class Guider
{
    public static function toPath($route)
    {
        return str_replace(':', '\\', $route);
    }
    
    public static function getViewFolderPath($path)
    {
        $guide = explode('\\', self::toPath($path));
        $guide = $guide[0] . '\\' . $guide[1] . '\\Views';
        return $guide;
    }
}