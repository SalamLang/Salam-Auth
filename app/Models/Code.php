<?php

namespace App\Models;

class Code extends Main
{
    public static function all()
    {
        return Main::getAll('codes');
    }

    public static function find($id)
    {
        $array = Main::getFind('codes', $id);

        return end($array);
    }

    public static function where($parameter1, $parameter2)
    {
        $array = Main::getWhere('codes', $parameter1, $parameter2);

        return end($array);
    }
}
