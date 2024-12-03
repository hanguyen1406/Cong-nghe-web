<?php
require_once '../models/flower.php';

class AdminFlowerController {
    public function index() {
        $flowerModel = new Flower();
        $flowers = $flowerModel->getAllFlowers();
        require '../views/admin/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $this->uploadImage($_FILES['image']);
    
            $flowerModel = new Flower();
            $flowerModel->createFlower($name, $description, $image);
            header('Location: /url/admin');
        } else {
            require '../views/admin/create.php';
        }
    }
    
    public function edit($queryParams) {
        $id = isset($queryParams['id']) ? (int) $queryParams['id'] : null;
    
        if (!$id) {
            echo "Invalid ID.";
            return;
        }
    
        $flowerModel = new Flower();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'] ? $this->uploadImage($_FILES['image']) : null;
    
            $flowerModel->updateFlower($id, $name, $description, $image);
            header('Location: /url/admin');
        } else {
            $flower = $flowerModel->getFlowerById($id);
            if ($flower) {
                require '../views/admin/edit.php';
            } else {
                echo "Flower not found.";
            }
        }
    }
    
    
    private function uploadImage($file) {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $uploadsDir = '../url/uploads/';
            $filename = time() . '_' . basename($file['name']);
            $targetPath = $uploadsDir . $filename;
    
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                return $filename;
            }

        }
        return null;
    }
    
    public function delete($queryParams) {
        $id = isset($queryParams['id']) ? (int) $queryParams['id'] : null;    
        if (!$id) {
            echo "Invalid ID.";
            return;
        }
        $flowerModel = new Flower();
        $flowerModel->deleteFlower($id);
        header('Location: /url/admin');
    }
}
