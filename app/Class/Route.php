<?php

namespace App\Class;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Route
{
    public static $lists;
    public static function lists($params): void
    {
        self::$lists = $params;
    }

    public static function get($key)
    {
        return self::$lists[$key];
    }
}
