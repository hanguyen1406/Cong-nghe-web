<?php
include '../db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM folower WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$image = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if ($_FILES['image']['error'] == 0) {
        $newImage = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../hoadep/$newImage");

        // Xóa ảnh cũ
        if (file_exists("../uploads/" . $image['image'])) {
            unlink("../uploads/" . $image['image']);
        }
    } else {
        $newImage = $image['image'];
    }

    // Cập nhật dữ liệu
    $sql = "UPDATE folower SET name = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $newImage, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa ảnh</title>
</head>
<body>
    <h1>Sửa ảnh</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Tên:</label><br>
        <input type="text" name="name" value="<?php echo $image['name']; ?>" required><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea name="description" required><?php echo $image['description']; ?></textarea><br><br>

        <label for="image">Ảnh hiện tại:</label><br>
        <img src="../uploads/<?php echo $image['image']; ?>" width="100"><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
