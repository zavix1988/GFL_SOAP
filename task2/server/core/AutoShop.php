<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 13.06.19
 * Time: 11:58
 */

namespace core;
use core\Db;

class AutoShop
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Db::instance();
        $this->allCars = [];
    }



    public function getallcars()
    {
        $sql = "SELECT ashop_cars.id, ashop_brands.name, ashop_cars.model FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id";

        return 1;
        //return $this->pdo->query($sql);
    }




    public function getCarById($id)
    {
        $sql = "SELECT ashop_brands.name, ashop_cars.model, ashop_cars.year, ashop_cars.displacement, ashop_cars.color, ashop_cars.max_speed, ashop_cars.price FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id WHERE ashop_cars.id = ? LIMIT 1";
        $result = $this->pdo->query($sql, [$id]);
        return $result[0];
    }

    public function getCarByParam($year, $brand = false, $model = false, $displacement = false, $color = false, $max_speed = false, $price = false)
    {
        $sql = "SELECT ashop_brands.name, ashop_cars.model, ashop_cars.year, ashop_cars.displacement, ashop_cars.color, ashop_cars.max_speed, ashop_cars.price FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id WHERE ashop_cars.year = ? ";
        $params[] = $year;

        if ($brand){
            $sql .= "AND ashop_brand.name = ? ";
            $params[] = $brand;
        }
        if ($model){
            $sql .= "AND ashop_cars.model = ? ";
            $params[] = $model;
        }
        if ($color){
            $sql .= "AND ashop_cars.color = ? ";
            $params[] = $color;
        }
        if ($max_speed) {
            $sql .= "AND ashop_cars.max_speed <= ? ";
            $params[] = $max_speed;
        }
        if ($displacement) {
            if($displacement['min']){
                $sql .= "AND ashop_cars.displacement >= ? ";
                $params[] = $displacement['min'];
            }
            if($displacement['max']){
                $sql .= "AND ashop_cars.displacement <= ? ";
                $params[] = $displacement['max'];
            }
        }
        if ($price) {
            if($price['min']){
                $sql .= "AND ashop_cars.price >= ? ";
                $params[] = $price['min'];
            }
            if($price['max']){
                $sql .= "AND ashop_cars.price <= ? ";
                $params[] = $price['max'];
            }
        }

        return $this->pdo->query($sql, $params);
    }

    public function setOrder($carId, $firstName, $lastName, $payment)
    {
        $sql = "INSERT INTO ashop_orders (car_id, first_name, last_name, payment) VALUES (?, ?, ?, ?)";
        return $this->pdo->execute($sql, [$carId, $firstName, $lastName, $payment]);
    }
}

