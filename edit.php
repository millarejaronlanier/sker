<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Treasure - One Piece Book Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="images/one-piece-skull-logo-png_seeklogo-613212.png" alt="One Piece" style="width: 100px; height: auto;"> <!-- Replace with actual image URL or path -->
        <h1>Edit Treasure (Book)</h1>
        <p>"Refine your map in the Grand Line of Literature!"</p>
    </header>
    <nav>
        <a href="index.php">Back to Straw Hat Library</a> | <a href="add.php">Add New Treasure</a> | <a href="insights.php">View Pirate Insights</a>
    </nav>
    <?php
    $book = null;
    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id'])) {
            $stmt = $pdo->prepare("UPDATE books SET title=?, author=?, genre=?, year=? WHERE id=?");
            $stmt->execute([$_POST['title'], $_POST['author'], $_POST['genre'], $_POST['year'], $_POST['id']]);
            header("Location: index.php");
            exit(); // Ensure no further output after redirect
        } else {
            echo "<p>Error: Book ID not provided.</p>";
        }
    }

    if ($book) {
    ?>
    <form action="edit.php" method="post" class="pirate-form">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($book['id']); ?>">
        
        <label for="title">Title (Treasure Name):</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($book['title']); ?>" placeholder="e.g., One Piece Volume 1" required>
        
        <label for="author">Author (Pirate):</label>
        <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($book['author']); ?>" placeholder="e.g., Eiichiro Oda" required>
        
        <label for="genre">Genre (Island):</label>
        <input type="text" name="genre" id="genre" value="<?php echo htmlspecialchars($book['genre']); ?>" placeholder="e.g., Adventure">
        
        <label for="year">Year (Era):</label>
        <input type="number" name="year" id="year" value="<?php echo htmlspecialchars($book['year']); ?>" placeholder="e.g., 1997">
        
        <button type="submit">Update Treasure Chest</button>
    </form>
    <?php
    } else {
        echo "<p>Book not found. <a href='index.php'>Back to List</a></p>";
    }
    ?>
</body>
</html>