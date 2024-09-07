<?php

namespace App\Class;

use Flight;

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

    public static function route(): void
    {
        Flight::request()->url;
    }
}
