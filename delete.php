<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM MangaList WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Manga deleted successfully!";
        header("Location: index.php"); 
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No manga selected to delete.";
}
?>
