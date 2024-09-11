<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

const DS = DIRECTORY_SEPARATOR;
const DSUP = '..'.DS;

require __DIR__.DS.'..'.DS.'vendor'.DS.'autoload.php';

require_once __DIR__.DS.'..'.DS.'config'.DS.'bootstrap.php';
