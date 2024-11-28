<?php
include 'db.php';
$sql = "SELECT name, description, image FROM folower";
$stmt = $pdo->query($sql);
$images = $stmt->fetchAll();

// $images = [
//     [
//         'name' => '1. Đỗ Quyên',
//         'description' => 'Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay cả những ngày nắng nóng cao điểm của mùa hè. Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.',
//         'image' => 'doquyen.jpg'
//     ],
//     [
//         'name' => '2. Hải Đường',
//         'description' => 'Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.',
//         'image' => 'haiduong.jpg'
//     ],
//     [
//         'name' => '3. Hoa Mai',
//         'description' => 'Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.',
//         'image' => 'mai.jpg'
//     ],
//     [
//         'name' => '4. Tường Vy',
//         'description' => 'Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.',
//         'image' => 'tuongvy.jpg'
//     ]
// ];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <style>
            body {
                margin-left: 200px;
                margin-right: 200px;
            }
            .main {
                padding: 10px;
                box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            }
            .img {
                text-align: center; 
            }
        </style>
    </head>
    <body>
        <div class="main">
            <h1>
                14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân
                hè
            </h1>
            <?php 
            foreach($images as $index => $value) {
                echo "<div><b>".($index+1).". ".$value['name']."</b>";
                echo "<p>".$value['description']."</p>";
                echo "<div class='img'><img src='hoadep/".$value['image']."' /></div></div>";
            }

            ?>
        </div>
    </body>
</html>
