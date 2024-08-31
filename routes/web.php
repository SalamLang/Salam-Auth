<?php

global $route;

$route->get('/', function () {
   $flight = Flight::db();
});