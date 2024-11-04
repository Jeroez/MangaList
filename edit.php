<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM MangaList WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $manga = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];

        $update_sql = "UPDATE MangaList SET title = ?, author = ?, genre = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sssi", $title, $author, $genre, $id);

        if ($update_stmt->execute()) {
            echo "<script>alert('Manga updated successfully!'); window.location.href='index.php';</script>";
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "No manga selected to edit.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Manga</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div>
        <h1>Edit Manga</h1>
    </div>
    <div>
        <form id="from" method="POST" action="">
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $manga['title']; ?>" required><br>
            <label for="author">Author:</label>
            <input type="text" name="author" value="<?php echo $manga['author']; ?>"><br>
            <label for="genre">Genre:</label>
            <input type="text" name="genre" value="<?php echo $manga['genre']; ?>"><br>
            <button type="submit">Update Manga</button>
     </form>
     </div>

</body>
</html>
