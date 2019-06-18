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

    public function getAllCars()
    {
        $sql = "SELECT ashop_cars.id, ashop_brands.name AS brand, ashop_cars.model FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id";

        return $this->pdo->query($sql);
    }

    public function getCarById($id)
    {
        $sql = "SELECT ashop_cars.id, ashop_brands.name  AS brand, ashop_cars.model, ashop_cars.year, ashop_cars.displacement, ashop_cars.color, ashop_cars.max_speed, ashop_cars.price FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id WHERE ashop_cars.id = ? LIMIT 1";
        $result = $this->pdo->query($sql, [$id]);
        return $result[0];
    }

    public function getCarsByParam($in)
    {
        $sql = "SELECT ashop_cars.id, ashop_brands.name  AS brand, ashop_cars.model FROM ashop_cars INNER JOIN ashop_brands ON ashop_cars.brand_id=ashop_brands.id WHERE ashop_cars.year = ? ";
        $params[] = $in->year;

        if ($in->brand != ''){
            $sql .= "AND ashop_brands.name = ? ";
            $params[] = $in->brand;
        }
        if ($in->model != ''){
            $sql .= "AND ashop_cars.model = ? ";
            $params[] = $in->model;
        }
        if ($in->color != ''){
            $sql .= "AND ashop_cars.color = ? ";
            $params[] = $in->color;
        }
        if ($in->max_speed != 0) {
            $sql .= "AND ashop_cars.max_speed <= ? ";
            $params[] = $in->max_speed;
        }
        if ($in->minDisplacement != 0){
            $sql .= "AND ashop_cars.displacement >= ? ";
            $params[] = $in->minDisplacement;
        }
        if ($in->maxDisplacement != 0){
            $sql .= "AND ashop_cars.displacement <= ? ";
            $params[] = $in->maxDisplacement;
        }
        if ($in->minPrice != 0){
            $sql .= "AND ashop_cars.price >= ? ";
            $params[] = $in->minPrice;
        }
        if ($in->maxPrice != 0){
            $sql .= "AND ashop_cars.price <= ? ";
            $params[] = $in->maxPrice;
        }
        return $this->pdo->query($sql, $params);
    }

    public function setOrder($in)
    {
        $sql = "INSERT INTO ashop_orders (car_id, first_name, last_name, payment) VALUES (?, ?, ?, ?)";
        return $this->pdo->execute($sql, [(int)$in->carId, $in->firstName, $in->lastName, $in->payment]);
    }
}

