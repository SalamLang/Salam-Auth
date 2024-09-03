<?php

namespace App\Models;

class User extends Main
{
    public static function all()
    {
        return Main::getAll("users");
    }

    public static function find($id)
    {
        $array = Main::getFind("users", $id);

        return end($array);
    }

    public static function where($parameter1, $parameter2)
    {
        $array = Main::getWhere("users", $parameter1, $parameter2);

        return end($array);
    }
}
