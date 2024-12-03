<!DOCTYPE html>
<html>
<head>
    <title>Edit Flower</title>
</head>
<body>
    <h1>Edit Flower</h1>
    <form method="POST" action="/url/admin/edit?id=<?php echo $flower['id']; ?>" enctype="multipart/form-data">
        <label>Name:</label><input type="text" name="name" value="<?php echo htmlspecialchars($flower['name']); ?>" required><br>
        <label>Description:</label><textarea name="description" required><?php echo htmlspecialchars($flower['description']); ?></textarea><br>
        <label>Current Image:</label><br>
        <?php if ($flower['image']): ?>
            <img src="/url/uploads/<?php echo $flower['image']; ?>" alt="<?php echo htmlspecialchars($flower['image']); ?>" width="100"><br>
        <?php endif; ?>
        <label>New Image:</label><input type="file" name="image" accept="image/*"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
