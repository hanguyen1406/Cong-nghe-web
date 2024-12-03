<?php
require_once '../core/Router.php';
require_once '../controllers/AdminFlowerController.php';

$router = new Router();
$router->add('/url/admin', [new AdminFlowerController(), 'index']);
$router->add('/url/admin/create', [new AdminFlowerController(), 'create']);
$router->add('/url/admin/edit', [new AdminFlowerController(), 'edit']);
$router->add('/url/admin/delete', [new AdminFlowerController(), 'delete']);
$router->dispatch($_SERVER['REQUEST_URI']);

?>