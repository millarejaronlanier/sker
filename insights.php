<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pirate Insights - One Piece Book Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="images/one-piece-skull-logo-png_seeklogo-613212.png" alt="One Piece" style="width: 100px; height: auto;"> <!-- Replace with actual image URL or path -->
        <h1>Pirate Insights</h1>
        <p>"Uncover the hidden treasures of knowledge!"</p>
    </header>
    <nav>
        <a href="index.php">Back to Straw Hat Library</a> | <a href="add.php">Add New Treasure</a>
    </nav>
    <section class="insights-section">
        <h2>Top Authors by Book Count (Ranking)</h2>
        <ul class="pirate-list">
            <?php
            // Subquery to rank authors by count of books
            $stmt = $pdo->query("
                SELECT author, COUNT(*) AS book_count
                FROM books
                GROUP BY author
                HAVING book_count >= (
                    SELECT AVG(book_count) FROM (
                        SELECT COUNT(*) AS book_count FROM books GROUP BY author
                    ) AS avg_counts
                )
                ORDER BY book_count DESC
            ");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><strong>{$row['author']}</strong>: {$row['book_count']} treasures (books)</li>";
            }
            ?>
        </ul>
        <h2>Books Published After Average Year (Comparison)</h2>
        <ul class="pirate-list">
            <?php
            // Subquery for books after average publication year
            $stmt = $pdo->query("
                SELECT title, author, year
                FROM books
                WHERE year > (SELECT AVG(year) FROM books)
                ORDER BY year DESC
            ");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><em>{$row['title']}</em> by <strong>{$row['author']}</strong> ({$row['year']}) - A recent voyage!</li>";
            }
            ?>
        </ul>
    </section>
</body>
</html>