<!DOCTYPE html>
<html>
<head>
    <title>Add Flower</title>
</head>
<body>
    <h1>Add New Flower</h1>
    <form method="POST" action="/url/admin/create" enctype="multipart/form-data">
        <label>Name:</label><input type="text" name="name" required><br>
        <label>Description:</label><textarea name="description" required></textarea><br>
        <label>Image:</label><input type="file" name="image" accept="image/*"><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
