<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 17.06.2019
 * Time: 23:49
 */
require 'config/app.php';
require 'core/SClient.php';

$client = new SClient();


if(!empty($_GET['id'])){
    $car = $client->getCarById([(int)$_GET['id']]);
    require 'templates/header.tpl.php';
    require 'templates/Car.tpl.php';
    require 'templates/footer.tpl.php';
}elseif($_GET['WSDL']){
    $file = file_get_contents('http://gflpractice/GFL_SOAP/task2/server/wsdl/rules.wsdl');
    header("Content-Type: text/xml; charset=utf-8");
    echo $file;
}elseif($_POST){

}else{
    $allCars = $client->getAllCars();
    require 'templates/header.tpl.php';
    require 'templates/allCars.tpl.php';
    require 'templates/footer.tpl.php';
}