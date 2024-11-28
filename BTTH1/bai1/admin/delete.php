<?php
include '../db.php';

$id = $_GET['id'];

// Lấy thông tin ảnh
$sql = "SELECT * FROM folower WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$image = $stmt->fetch();

// Xóa ảnh trên server
if (file_exists("../uploads/" . $image['image'])) {
    unlink("../uploads/" . $image['image']);
}

// Xóa dữ liệu trong CSDL
$sql = "DELETE FROM folower WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>
