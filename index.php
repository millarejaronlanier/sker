<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>One Piece Book Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="images/one-piece-skull-logo-png_seeklogo-613212.png" alt="One Piece" style="width: 100px; height: auto;"> <!-- Replace with actual image URL or path -->
        <h1>Straw Hat Book Library</h1>
        <p>"Adventure awaits in every page!"</p>
    </header>
    <nav>
        <a href="add.php">Add New Treasure (Book)</a> | <a href="insights.php">View Pirate Insights</a>
    </nav>
    <table>
        <tr>
            <th>Title</th>
            <th>Author (Pirate)</th>
            <th>Genre (Island)</th>
            <th>Year (Era)</th>
            <th>Actions</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM books");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['author']}</td>
                    <td>{$row['genre']}</td>
                    <td>{$row['year']}</td>
                    <td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Delete</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
<header>
    <img src="images/one-piece-skull-logo-png_seeklogo-613212.png" alt="One Piece" style="width: 50px; height: auto; display: block; margin: 0 auto;">
    <h1>Straw Hat Book Library</h1>
    <p>"Adventure awaits in every page!"</p>
</header>