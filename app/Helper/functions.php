<?php

use eftec\bladeone\BladeOne;

function view($view, $data = null): void
{
    try {
        $views = __DIR__ . '/../resources/views/';
        $cache = __DIR__ . '/../cache';

        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

        echo $blade->run($view, $data);
    } catch (Exception $e) {
        print $e->getMessage();
    }
}

function env($key): ?string
{
    $file = fopen(__DIR__.DS.DSUP.DSUP.'.env', 'r');
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            if (empty($line) || $line[0] == '#') {
                continue;
            }
            [$k, $v] = explode('=', $line, 2);
            $k = trim($k);
            $v = trim($v);
            if ($k == $key) {
                fclose($file);

                return $v;
            }
        }
        fclose($file);
    }

    return null;
}