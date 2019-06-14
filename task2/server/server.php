<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 13.06.19
 * Time: 14:23
 */

ini_set("soap.wsdl_cache_enabled", 0);

require 'config/db.php';
require 'config/app.php';


spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});


//$cars = new \core\AutoShop();
//var_dump($cars->getAllCars());
//$cars->setOrder(1, 'Alex', 'Zhukov', 'credit_card');
//$cars->setOrder(4, 'Alex', 'Zhukov', 'credit_card');
//$cars->setOrder(2, 'Alex', 'Zhukov', 'credit_card');


//var_dump($server->getFunctions());



    $server = new SoapServer('wsdl/rules.wsdl');
    $server->setClass('core\AutoShop');
    $server->handle();
