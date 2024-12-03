<?php
// Prüfen, welcher Abschnitt angezeigt werden soll
$section = isset($_GET['section']) ? $_GET['section'] : 'home';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaceDays - CVJM Steinheim</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>RaceDays - CVJM Steinheim</h1>
        <nav>
            <ul>
                <li><a href="?section=home">Home</a></li>
                <li><a href="?section=regeln">Regeln</a></li>
                <li><a href="?section=preise">Preise</a></li>
                <li><a href="?section=oeffnungszeiten">Öffnungszeiten</a></li>
                <li><a href="?section=mia">Mitarbeiter werden</a></li>
                <li><a href="?section=feedback">Feedback</a></li>
                <li><a href="statistik.php">Statistik</a></li>
                <li><a href="?section=ueber_uns">Über uns</a></li>
                <li><a href="?section=essen">Essen</a></li>
                <li><a href="?section=sponsoren">Sponsoren</a></li>
                <li><a href="?section=newsletter">Newsletter</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        // Inhalte für jede Sektion dynamisch anzeigen
        switch ($section) {
            case 'home':
                echo '<h2>Willkommen bei den RaceDays!</h2>';
                echo '<p>Hier finden Sie alle Informationen zu unseren Events, Öffnungszeiten und mehr!</p>';
                break;
            case 'regeln':
                echo '<h2>Regeln</h2>';
                echo '<p>Hier finden Sie die Rennregeln...</p>';
                break;
            case 'preise':
                echo '<h2>Preise pro Fahrt</h2>';
                echo '<p>Erwachsene: 5 € pro Fahrt<br>Kinder: 3 € pro Fahrt</p>';
                break;
            case 'oeffnungszeiten':
                echo '<h2>Öffnungszeiten</h2>';
                echo '<p>Montag - Freitag: 10:00 - 18:00 Uhr<br>Samstag: 12:00 - 20:00 Uhr</p>';
                break;
            case 'mia':
                echo '<h2>Mitarbeiter werden</h2>';
                echo '<p>Wenn Sie Interesse haben, Mitarbeiter zu werden, kontaktieren Sie uns bitte!</p>';
                break;
            case 'feedback':
                echo '<h2>Feedback</h2>';
                echo '<p>Wir freuen uns über Ihr Feedback. Schreiben Sie uns!</p>';
                break;
            case 'statistik':
                echo '<h2>Statistik</h2>';
                echo '<p>Persönliche Statistik:</p>';
                echo '<ul>';
                echo '<li>Gefahrene Rennen: ' . rand(10, 100) . '</li>';
                echo '<li>Beste Zeit: ' . rand(10, 20) . ' Sekunden</li>';
                echo '<li>Gesamte Runden: ' . rand(100, 500) . '</li>';
                echo '</ul>';
                break;
            case 'ueber_uns':
                echo '<h2>Über uns</h2>';
                echo '<p>Wir sind ein ehrenamtliches Team, das spannende Rennen für die ganze Familie organisiert.</p>';
                break;
            case 'essen':
                echo '<h2>Essen</h2>';
                echo '<p>Snacks und Getränke sind an unserer Rennstrecke erhältlich!</p>';
                break;
            case 'sponsoren':
                echo '<h2>Sponsoren</h2>';
                echo '<p>Wir bedanken uns bei unseren Sponsoren für ihre Unterstützung!</p>';
                break;
            case 'newsletter':
                echo '<h2>Newsletter</h2>';
                echo '<p>Melden Sie sich für unseren Newsletter an, um über RaceDays informiert zu bleiben!</p>';
                break;
            default:
                echo '<h2>Seite nicht gefunden</h2>';
                echo '<p>Die angeforderte Seite existiert nicht.</p>';
                break;
        }
        ?>
    </main>
    <footer>
        <p>© 2024 RaceDays - CVJM Steinheim | <a href="https://cvjm-steinheim.de">CVJM Steinheim</a></p>
    </footer>
</body>
</html>

