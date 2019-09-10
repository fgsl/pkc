<?php
/**
 * PHP Kubectl terminal console
 * @author Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @license https://www.gnu.org/licenses/lgpl-3.0.en.html
 */
namespace App\Helper;

class Timer
{
    private static $startTime;
    
    public static function start(): void
    {
        self::$startTime = microtime(true);
    }
    
    public static function stop(int $precision = 2): float
    {
        return round(microtime(true) - self::$startTime, $precision);
    }    
}

