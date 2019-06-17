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

    public function getCarById()
    {
        return $this->server->getCarById();
    }

    public function getCarsByParam()
    {
        return $this->server->getCarsByParam();
    }

    public function setOrder()
    {
        return $this->setOrder();
    }
}