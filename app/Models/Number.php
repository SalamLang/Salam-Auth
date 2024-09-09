<?php

namespace App\Models;

class Number extends Main
{
    public static function all()
    {
        return Main::getAll('numbers');
    }

    public static function find($id)
    {
        $array = Main::getFind('numbers', $id);

        return end($array);
    }

    public static function where($parameter1, $parameter2)
    {
        $array = Main::getWhere('numbers', $parameter1, $parameter2);

        return end($array);
    }
}
