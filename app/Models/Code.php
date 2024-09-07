<?php

namespace App\Models;

class Code extends Main
{
    public static function all()
    {
        return Main::getAll('tokens');
    }

    public static function find($id)
    {
        $array = Main::getFind('tokens', $id);

        return end($array);
    }

    public static function where($parameter1, $parameter2)
    {
        $array = Main::getWhere('tokens', $parameter1, $parameter2);

        return end($array);
    }
}
