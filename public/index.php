<?php

const DS = DIRECTORY_SEPARATOR;
const DSUP = '..'.DS;

require __DIR__.DS.'..'.DS.'vendor'.DS.'autoload.php';

require __DIR__.DS.'..'.DS.'routes'.DS.'api.php';

require __DIR__.DS.'..'.DS.'routes'.DS.'web.php';

Flight::start();