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

    $server = new SoapServer('wsdl/rules.wsdl');
    $server->setClass('core\AutoShop', array('cache_wsdl' => WSDL_CACHE_NONE));
    $server->handle();