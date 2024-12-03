<?php
// Statistik-Seite mit Login-Bereich
session_start();

if (!isset($_SESSION['loggedin'])) {
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
    </header>
    <main>
        <h2>Ihre persönliche Statistik</h2>
        <p>Hier sehen Sie Ihre persönlichen Rennstatistiken:</p>
        <ul>
            <li>Gefahrene Rennen: <?php echo rand(10, 100); ?> </li>
            <li>Beste Zeit: <?php echo rand(10, 20) . " Sekunden"; ?></li>
            <li>Gesamte Runden: <?php echo rand(100, 500); ?></li>
        </ul>
        <a href="logout.php">Logout</a>
    </main>
    <footer>
        <p>© 2024 RaceDays - CVJM Steinheim</p>
    </footer>
</body>
</html>
