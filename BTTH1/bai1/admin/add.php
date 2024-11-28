<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Xử lý upload ảnh
    if ($_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../hoadep/$image");

        // Thêm dữ liệu vào CSDL
        $sql = "INSERT INTO folower (name, description, image) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $description, $image]);

        header("Location: index.php");
        exit;
    } else {
        echo "Lỗi upload ảnh!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm ảnh</title>
</head>
<body>
    <h1>Thêm ảnh mới</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Tên:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea name="description" required></textarea><br><br>

        <label for="image">Ảnh:</label><br>
        <input type="file" name="image" required><br><br>

        <button type="submit">Thêm</button>
    </form>
</body>
</html>
