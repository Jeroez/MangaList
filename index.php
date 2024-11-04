<?php
include 'db.php';

$sql = "SELECT * FROM MangaList";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manga List</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <h1>Manga List</h1> <br>
    <table id="Tab" style="border: 1px solid black;">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
                echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this manga?\");'>Delete</a>";

                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No manga found</td></tr>";
        }
        ?>
        <tr>
        <td colspan="4" id="newRow">
            <a id="New" href="add.php">Add New Manga (+)</a>
        </td>
        </tr>
    </table>
</body>
</html>

<?php
$conn->close();
?>
