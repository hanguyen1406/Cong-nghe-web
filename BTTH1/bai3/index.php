<?php
$filename = "user.csv";
// Đọc tệp CSV vào mảng
$sinhvien = [];
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc dòng đầu tiên (tiêu đề cột)
    $header = fgetcsv($handle, 1000, ",");
    // echo $header;
    
    // Đọc các dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data[0] = strval($data[0]);  // Giả sử 'username' là cột đầu tiên
        // Tạo mảng sinh viên từ mỗi dòng
        $sinhvien[] = array_combine($header, $data);
    }
    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Mật khẩu</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Lớp</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Hiển thị từng sinh viên
                foreach ($sinhvien as $sv) {
                    echo "<tr>";
                    echo "<td>" . implode("<td>", $sv) . "</td>";  // Nối tất cả các giá trị trong mảng thành chuỗi
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>