<?php

global $route;

require_once "database.php";

require_once "routes.php";

//Handle 404 errors
$route->map('*', function () {
    abort(404);
});

Flight::start();
