<?php

namespace App\Class;

class Vite
{
    protected static $manifest;

    public static function load($path)
    {
        if (is_null(self::$manifest)) {
            $manifestPath = __DIR__ . '/../../public/build/manifest.json';
            if (file_exists($manifestPath)) {
                self::$manifest = json_decode(file_get_contents($manifestPath), true);
            }
        }

        return self::$manifest[$path]['file'] ?? $path;
    }

    public static function js($path): string
    {
        $file = self::load($path);
        return '<script type="module" src="/build/' . $file . '"></script>';
    }

    public static function css($path): string
    {
        $file = self::load($path);
        return '<link rel="stylesheet" href="/build/' . $file . '">';
    }
}
