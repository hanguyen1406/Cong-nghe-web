<?php
require_once '../models/flower.php';

class FlowerController {
    public function index() {
        $flowerModel = new Flower();
        $flowers = $flowerModel->getAllFlowers();
        require '../views/flowers/list.php';
    }
}
