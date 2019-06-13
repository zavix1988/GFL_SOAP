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
    }

    public function getAllCars()
    {
        $sql = "SELECT cars.id, brands.name, cars.model FROM cars INNER JOIN brands ON cars.brand_id=brands.id";
        return $this->pdo->query($sql);
    }

    public function getCarById($id)
    {
        $sql = "SELECT brands.name, cars.model, cars.year, cars.displacement, cars.color, cars.max_speed, cars.price FROM cars INNER JOIN brands ON cars.brand_id=brands.id WHERE cars.id = ? LIMIT 1";
        $result = $this->pdo->query($sql, [$id]);
        return $result[0];
    }

    public function getCarByParam($year, $brand = false, $model = false, $displacement = false, $color = false, $max_speed = false, $price = false)
    {
        $sql = "SELECT brands.name, cars.model, cars.year, cars.displacement, cars.color, cars.max_speed, cars.price FROM cars INNER JOIN brands ON cars.brand_id=brands.id WHERE cars.year = ? ";
        $params[] = $year;

        if ($brand){
            $sql .= "AND brand.name = ? ";
            $params[] = $brand;
        }
        if ($model){
            $sql .= "AND cars.model = ? ";
            $params[] = $model;
        }
        if ($color){
            $sql .= "AND cars.color = ? ";
            $params[] = $color;
        }
        if ($max_speed) {
            $sql .= "AND cars.max_speed <= ? ";
            $params[] = $max_speed;
        }
        if ($displacement) {
            if($displacement['min']){
                $sql .= "AND cars.displacement >= ? ";
                $params[] = $displacement['min'];
            }
            if($displacement['max']){
                $sql .= "AND cars.displacement <= ? ";
                $params[] = $displacement['max'];
            }
        }
        if ($price) {
            if($price['min']){
                $sql .= "AND cars.price >= ? ";
                $params[] = $price['min'];
            }
            if($price['max']){
                $sql .= "AND cars.price <= ? ";
                $params[] = $price['max'];
            }
        }

        return $this->pdo->query($sql, $params);
    }
}

