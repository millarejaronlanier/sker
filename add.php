<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Treasure - One Piece Book Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="images/one-piece-skull-logo-png_seeklogo-613212.png" alt="One Piece" style="width: 100px; height: auto;"> <!-- Replace with actual image URL or path -->
        <h1>Add New Treasure (Book)</h1>
        <p>"Chart a new course in the Grand Line of Literature!"</p>
    </header>
    <nav>
        <a href="index.php">Back to Straw Hat Library</a> | <a href="insights.php">View Pirate Insights</a>
    </nav>
    <form action="add.php" method="post" class="pirate-form">
        <label for="title">Title (Treasure Name):</label>
        <input type="text" name="title" id="title" placeholder="e.g., One Piece Volume 1" required>
        
        <label for="author">Author (Pirate):</label>
        <input type="text" name="author" id="author" placeholder="e.g., Eiichiro Oda" required>
        
        <label for="genre">Genre (Island):</label>
        <input type="text" name="genre" id="genre" placeholder="e.g., Adventure">
        
        <label for="year">Year (Era):</label>
        <input type="number" name="year" id="year" placeholder="e.g., 1997">
        
        <button type="submit">Add to Treasure Chest</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stmt = $pdo->prepare("INSERT INTO books (title, author, genre, year) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['title'], $_POST['author'], $_POST['genre'], $_POST['year']]);
        header("Location: index.php");
        exit(); // Prevent further execution
    }
    ?>
</body>
</html>