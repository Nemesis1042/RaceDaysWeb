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
                <li><a href="?section=statistik">Statistik</a></li>
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
                echo '<p>Do., 2. Januar 2025 - So., 5. Januar 2025</p>';
                echo '<p>Täglich von 10:00 Uhr bis 19:00 Uhr.</p>';
                break;
            case 'mia':
                

                if (isset($_POST['code']) && $_POST['code'] === 'Racedays24') {
                    echo '<div class="info-container">';
                    echo '<p>Hier finden Sie wichtige Informationen zu den verschiedenen Bereichen der RaceDays:</p>';
                    echo '<ul class="info-list">';
                    echo '<li><a href="https://docs.google.com/spreadsheets/d/11WD0oX-kBAWWdzyax5D5tSnaUc8qnUh8/edit?usp=sharing&ouid=107881440527806522583&rtpof=true&sd=true" target="_blank">Küche</a></li>';
                    echo '<li><a href="https://docs.google.com/spreadsheets/d/1zO1QiYiBHmlmoakZjikYvCwwzT51ugE3/edit?usp=sharing&ouid=107881440527806522583&rtpof=true&sd=true" target="_blank">Café Theke</a></li>';
                    echo '<li><a href="https://docs.google.com/spreadsheets/d/1n3-zakQYwaCxrh9pEH8Pv6jesHiPdKjR/edit?usp=sharing&ouid=107881440527806522583&rtpof=true&sd=true" target="_blank">Tickets</a></li>';
                    echo '<li><a href="https://docs.google.com/spreadsheets/d/1o2Pr5g8lfIbdlV8vXIqCLG7U3o6U29LK/edit?gid=386618619#gid=386618619" target="_blank">Rennleitung</a></li>';
                    echo '<li><a href="https://docs.google.com/spreadsheets/d/1v1NqYZGMGi6gUDu0gWVmK_kvJe1iytSA/edit?gid=365652314#gid=365652314" target="_blank">Streckenposten/AutoEinsetzen</a></li>';
                    echo '</ul>';
                    echo '</div>';
                } else {
                    echo '<h2>Mitarbeiter werden</h2>';
                    echo '<p>Wenn Sie Interesse haben, Mitarbeiter zu werden, kontaktieren Sie uns bitte!</p>';
                    echo '<form method="POST" action="" class="">';
                    echo '<label for="code">Code:   </label>';
                    echo '<input type="text" id="code" name="code" required>';
                    echo '<button type="submit">Einreichen</button>';
                    echo '</form>';
                    echo '<div class="error-container">';
                    echo '<p class="error-message">Melde dich bei einem Mitarbeiter, um den Code zu bekommen.</p>';
                    echo '</div>';
                }
                break;
            case 'feedback':
                echo '<h2>Feedback</h2>';
                echo '<p>Wir freuen uns über Ihr Feedback. Schreiben Sie uns!</p>';

                // Feedback-Formular
                echo '<form method="POST" action="">';
                echo '<label for="name">Ihr Name:</label>';
                echo '<input type="text" id="name" name="name" required>';

                echo '<label for="email">Ihre E-Mail-Adresse:</label>';
                echo '<input type="email" id="email" name="email" required>';

                echo '<label for="message">Ihre Nachricht:</label>';
                echo '<textarea id="message" name="message" rows="5" required></textarea>';

                echo '<button type="submit">Absenden</button>';
                echo '</form>';

                // E-Mail-Versand
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $to = 'feedback@race-days-test.coM'; // Ersetze durch deine E-Mail-Adresse
                    $subject = 'Feedback von der Website';

                    // Benutzereingaben verarbeiten
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $message = htmlspecialchars($_POST['message']);

                    // E-Mail-Inhalt
                    $body = "Name: $name\nE-Mail: $email\n\nNachricht:\n$message";

                    // E-Mail-Header
                    $headers = "From: $email";

                    // Senden der E-Mail
                    if (mail($to, $subject, $body, $headers)) {
                        echo '<p class="success">Vielen Dank für Ihr Feedback!</p>';
                    } else {
                        echo '<p class="error">Es gab ein Problem beim Senden Ihrer Nachricht. Bitte versuchen Sie es später erneut.</p>';
                    }
                }
                break;
            case 'statistik':
            echo '<script>window.location.href = "statistik.php";</script>';
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

