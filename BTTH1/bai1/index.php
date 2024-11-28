<?php
include 'db.php';
$sql = "SELECT name, description, image FROM folower";
$stmt = $pdo->query($sql);
$images = $stmt->fetchAll();

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
