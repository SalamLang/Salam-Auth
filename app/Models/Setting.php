<?php

namespace App\Models;

class Setting extends Main
{
    public static function all()
    {
        return Main::getAll('settings');
    }

    public static function find($id)
    {
        $array = Main::getFind('settings', $id);

        return end($array);
    }

    public static function where($parameter1, $parameter2)
    {
        $array = Main::getWhere('settings', $parameter1, $parameter2);

        return end($array);
    }
}
