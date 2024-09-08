<?php

namespace App\Models;

class ForgotToken extends Main
{
    public static function all()
    {
        return Main::getAll('forgot_tokens');
    }

    public static function find($id)
    {
        $array = Main::getFind('forgot_tokens', $id);

        return end($array);
    }

    public static function where($parameter1, $parameter2)
    {
        $array = Main::getWhere('forgot_tokens', $parameter1, $parameter2);

        return end($array);
    }
}
