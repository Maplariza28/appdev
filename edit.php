<?php
require 'db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$_POST['name'], $_POST['email'], $_POST['course'], $id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Edit Student</h1>

<form method="POST">
    <input type="text" name="name" value="<?= $student['name'] ?>" required>
    <input type="email" name="email" value="<?= $student['email'] ?>" required>
    <input type="text" name="course" value="<?= $student['course'] ?>" required>
    <button type="submit">Update</button>
</form>

</body>
</html>