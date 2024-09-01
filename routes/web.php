<?php

global $route;

$route->get('/', function () {
    view("index");
});
