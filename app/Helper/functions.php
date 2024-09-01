<?php

use eftec\bladeone\BladeOne;

function view($view, $data = []): void
{
    try {
        $views = __DIR__.DS.DSUP.DSUP.'resources'.DS.'views'.DS;
        $cache = __DIR__.DS.DSUP.DSUP.'cache';

        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

        echo $blade->run($view, $data);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function abort($error = '404'): void
{
    switch ($error) {
        case '400':
            view('errors.400');
            break;
        case '401':
            view('errors.401');
            break;
        case '402':
            view('errors.402');
            break;
        case '403':
            view('errors.403');
            break;
        case '404':
            view('errors.404');
            break;
        case '500':
            view('errors.500');
            break;
        default:
            echo $error;
            break;
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
