<?php
require_once '../core/Router.php';
require_once '../controllers/FlowerController.php';

$router = new Router();
$router->add('/url', [new FlowerController(), 'index']);
$router->dispatch($_SERVER['REQUEST_URI']);

?>