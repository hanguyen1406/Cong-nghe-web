<!DOCTYPE html>
<html>
<head>
    <title>Admin - Flowers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
        a {
            text-decoration: none;
            color: blue;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <h1>Admin - Flowers</h1>
    <a href="/url/admin/create">Add New Flower</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $index => $flower): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($flower['name']); ?></td>
                    <td><?php echo htmlspecialchars($flower['description']); ?></td>
                    <td>
                        <?php if ($flower['image']): ?>
                            <img src="/url/uploads/<?php echo htmlspecialchars($flower['image']); ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/url/admin/edit?id=<?php echo $flower['id']; ?>">Edit</a>
                        <a href="/url/admin/delete?id=<?php echo $flower['id']; ?>" onclick="return confirm('Are you sure you want to delete this flower?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
