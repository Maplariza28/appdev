<?php 
require 'db.php';

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Student List</h1>

    <a href="create.php" class="add">+ Add Student</a>

    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
        </tr>

        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= htmlspecialchars($s['course']) ?></td>
            <td>
                <a href="edit.php?id=<?= $s['id'] ?>" class="edit">Edit</a>
                <a href="delete.php?id=<?= $s['id'] ?>" class="delete" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>