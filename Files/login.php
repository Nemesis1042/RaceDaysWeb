<?php
session_start();

// Redirect to the protected page if already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: statistik.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $db = new PDO('sqlite:./database.sqlite');

    // Fetch user by username
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username; // Optional: Store username
        header('Location: statistik.php');
        exit;
    } else {
        $error = "Falscher Benutzername oder Passwort!";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RaceDays</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form method="POST" action="" class="info-container">
            <label for="username">Benutzername:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <br>
            <button type="submit">Login</button>
        </form>
        <button onclick="location.href='index.php'" class="info-list">Zurück zur Startseite</button>
        <?php if (isset($error)) echo "<div class='error-container'><p class='error-message'>$error</p></div>"; ?>
    </main>
</body>
</html>
