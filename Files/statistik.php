<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik - RaceDays</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Statistik</h1>
        <nav>
            <ul>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Willkommen, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Ihre persönliche Statistik:</p>
        <ul>
            <li>Gefahrene Rennen: <?php echo rand(10, 100); ?></li>
            <li>Beste Zeit: <?php echo rand(10, 20); ?> Sekunden</li>
            <li>Gesamte Runden: <?php echo rand(100, 500); ?></li>
        </ul>
    </main>
</body>
</html>
