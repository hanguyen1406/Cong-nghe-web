<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <?php 
        include './products.php';
        static $dem=0;
    ?>
    <title>Document</title>
</head>
<body>
    
<div class="container">
<table class="table mt-3">
  <thead>
    <tr style="border-top: solid 1px #000 ;">
      <th scope="col">STT</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr> 
  </thead>
  <tbody>
    
     <?php foreach ($products as $product): ?> 
     <tr>
        <th scope="row"><?php echo ++$dem?></th>
        <td ><?php echo ($product['name']) ?></td>
        <td><?php echo ($product['price']) ?></td>
        
     </tr> 
     <?php endforeach; ?>

  </tbody>
</table>
</div>
</body>
</html>