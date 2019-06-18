<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 17.06.2019
 * Time: 23:49
 */
require 'config/app.php';
require 'core/SClient.php';
require 'core/functions.php';

$client = new SClient();



if(!empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    $car = $client->getCarById($id);
    require 'templates/header.tpl.php';
    require 'templates/car.tpl.php';
    require 'templates/footer.tpl.php';
}elseif(!empty($_GET['car'])){
    $carId = (int)$_GET['car'];
    require 'templates/header.tpl.php';
    require 'templates/order.tpl.php';
    require 'templates/footer.tpl.php';
}elseif($_POST){
    if(!empty($_POST['carId'])){
        $id = (int)$_POST['carId'];
        $firstName = cleanPostString($_POST['firstName']);
        $lastName = cleanPostString($_POST['lastName']);
        $payment = cleanPostString($_POST['payment']);
        if($client->setOrder($id, $firstName, $lastName, $payment)){
            header('Location: '.HOME);
        }
    }elseif (!empty($_POST['year'])){
        $year = (int)$_POST['year'];
        $brand = empty($_POST['brand']) ? '' : cleanPostString($_POST['brand']);
        $model = empty($_POST['model']) ? '' : cleanPostString($_POST['model']);
        $color = empty($_POST['color']) ? '' : cleanPostString($_POST['color']);
        $maxSpeed = (int)$_POST['max_speed'];
        $minDisplacement = (float)$_POST['min_displacement'];
        $maxDisplacement = (float)$_POST['max_displacement'];
        $minPrice = (int)$_POST['min_price'];
        $maxPrice = (int)$_POST['max_price'];
        $allCars = $client->getCarsByParam($year, $brand, $model, $color, $maxSpeed, $minDisplacement, $maxDisplacement, $minPrice, $maxPrice);

        require 'templates/header.tpl.php';
        require 'templates/allCars.tpl.php';
        require 'templates/footer.tpl.php';
    }
}else{
    $allCars = $client->getAllCars();
    require 'templates/header.tpl.php';
    require 'templates/allCars.tpl.php';
    require 'templates/footer.tpl.php';
}