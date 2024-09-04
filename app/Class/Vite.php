<?php

namespace App\Class;

class Vite
{
    protected static $manifest;

    public static function load($path)
    {
        if (is_null(self::$manifest)) {
            $manifestPath = __DIR__.'/../../public/build/manifest.json';
            if (file_exists($manifestPath)) {
                self::$manifest = json_decode(file_get_contents($manifestPath), true);
            }
        }

        //        if (self::$manifest !== null){
        //            return self::$manifest[$path]['file'];
        //        }else {
        //            $out = shell_exec("cd .. && cd resources && php -S " . substr(env("Vite_URL"),7));
        //            return env("Vite_URL") . substr($path, 9);
        //        }
        return self::$manifest[$path]['file'] ?? $path;
    }

    public static function js($path): string
    {
        $file = self::load($path);

        return '<script type="module" src="/build/'.$file.'"></script>';
    }

    public static function css($path): string
    {
        $file = self::load($path);

        if (self::$manifest !== null) {
            return '<link rel="stylesheet" href="/build/'.$file.'">';
        } else {
            return '<link rel="stylesheet" href="'.$file.'">';
        }
    }
}
