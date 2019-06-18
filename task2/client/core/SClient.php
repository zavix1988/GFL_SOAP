<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 17.06.2019
 * Time: 23:52
 */

class SClient
{
    private $server;

    public function __construct()
    {
        $this->server = new SoapClient(WSDL);
    }

    public function getAllCars()
    {
        return $this->server->getallCars();
    }

    public function getCarById($id)
    {

        return $this->server->getCarById($id);
    }

    public function getCarsByParam($year, $brand, $model, $color, $max_speed, $minDisplacement, $maxDisplacement, $minPrice, $maxPrice)
    {
        return $this->server->getCarsByParam([
            'year' => $year,
            'brand' => $brand,
            'model' => $model,
            'color' => $color,
            'max_speed' => $max_speed,
            'minDisplacement' => $minDisplacement,
            'maxDisplacement' => $maxDisplacement,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice
        ]);
    }

    public function setOrder($id, $firstName, $lastName, $payment)
    {
        return $this->server->setOrder(['carId' => $id, 'firstName' => $firstName, 'lastName' => $lastName, 'payment' => $payment]);
    }
}