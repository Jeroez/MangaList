<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];

    $stmt = $conn->prepare("INSERT INTO MangaList (title, author, genre) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $author, $genre);

    if ($stmt->execute()) {
        echo "<script>alert('Manga Created successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Manga</title> 
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div>
        <h1>Add New Manga</h1> 
    </div>
    <div>
        <form id="from" method="POST" action="add.php">
            <label for="title">Title:</label>
            <input type="text" name="title" required><br>
            <label for="author">Author:</label>
            <input type="text" name="author"><br>
            <label for="genre">Genre:</label>
            <input type="text" name="genre"><br>
            <button type="submit">Add Manga</button>
        </form>
    </div>
</body>
</html>
