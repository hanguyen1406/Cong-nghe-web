<?php
include '../db.php';

// Lấy dữ liệu từ bảng "folower"
$sql = "SELECT * FROM folower";
$stmt = $pdo->query($sql);
$images = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý hoa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .add {
            padding: 10px;
            background-color: green; /* Sửa lỗi chính tả 'backkground-color' */
            border-radius: 5px; /* Sửa lỗi chính tả 'border-radious' */
            color: white;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <h1>Quản lý ảnh</h1>
    <a class="add" href="add.php">Thêm ảnh mới</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($images as $image): ?>
                <tr>
                    <td><?php echo $image['id']; ?></td>
                    <td><?php echo $image['name']; ?></td>
                    <td><?php echo $image['description']; ?></td>
                    <td>
                        <img src="../hoadep/<?php echo $image['image']; ?>" alt="<?php echo $image['name']; ?>" width="100">
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $image['id']; ?>">Sửa</a> | 
                        <a href="delete.php?id=<?php echo $image['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
