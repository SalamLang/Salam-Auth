<?php

require_once "cors.php";

global $route;

require_once 'database.php';

require_once 'routes.php';

//Handle 404 errors
Flight::route('*', function () {
    abort(404);
});

Flight::start();
