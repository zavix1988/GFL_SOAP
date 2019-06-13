<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 13.06.19
 * Time: 14:23
 */

use core\AutoShop;

require 'config/db.php';
require 'config/app.php';


spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});

$cars = new AutoShop();

//$allCars = $cars->getAllCars();
$car = $cars->getCar(1);

var_dump($car);