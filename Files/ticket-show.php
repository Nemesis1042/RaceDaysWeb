<?php

$db = new SQLite3('race_data.db');
$result = $db->query("SELECT * FROM race_table");
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renn-Daten Anzeigen</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Renn-Daten Anzeigen</h2>
    <table>
        <thead>
            <tr>
                <th>Geplante Startzeit</th>
                <th>Aktuelle Startzeit</th>
                <th>Startnummer</th>
                <th>Bahn</th>
                <th>Vorname</th>
                <th>Name</th>
                <th>Geschlecht</th>
                <th>Alter</th>
                <th>Bestzeit</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
                <tr>
                    <td><?= $row['startzeit_geplant'] ?></td>
                    <td><?= $row['startzeit_tatsaechlich'] ?></td>
                    <td><?= $row['no'] ?></td>
                    <td><?= $row['bahn'] ?></td>
                    <td><?= $row['vorname'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['mw'] ?></td>
                    <td><?= $row['age'] ?></td>
                    <td><?= $row['bestzeit'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
