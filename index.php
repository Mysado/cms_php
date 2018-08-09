<?php
error_reporting(-1);
ini_set('display_errors','On');

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\Router;
use App\Core\Request;

try{
	Router::load('app/routes.php')->direct(Request::uri(),Request::method());
}catch(\Exception $e){
	echo '404 page not found';
	echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
}
