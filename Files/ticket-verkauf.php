<?php
$db = new SQLite3('race_data.db');
$result = $db->query("SELECT * FROM race_table");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daten Bearbeiten</title>
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
    <h2>Daten Bearbeiten</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Bahn</th>
                <th>Vorname</th>
                <th>Name</th>
                <th>M/W</th>
                <th>Alter</th>
                <th>Bestzeit</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
                <tr>
                    <td><?= $row['no'] ?></td>
                    <td><input type="text" value="<?= $row['bahn'] ?>" data-id="<?= $row['id'] ?>" data-key="bahn" /></td>
                    <td><input type="text" value="<?= $row['vorname'] ?>" data-id="<?= $row['id'] ?>" data-key="vorname" /></td>
                    <td><input type="text" value="<?= $row['name'] ?>" data-id="<?= $row['id'] ?>" data-key="name" /></td>
                    <td><input type="text" value="<?= $row['mw'] ?>" data-id="<?= $row['id'] ?>" data-key="mw" /></td>
                    <td><input type="text" value="<?= $row['alter'] ?>" data-id="<?= $row['id'] ?>" data-key="alter" /></td>
                    <td><input type="text" value="<?= $row['bestzeit'] ?>" data-id="<?= $row['id'] ?>" data-key="bestzeit" /></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('change', async (event) => {
                const id = event.target.dataset.id;
                const key = event.target.dataset.key;
                const value = event.target.value;

                const formData = new FormData();
                formData.append('id', id);
                formData.append(key, value);

                await fetch('backend.php', {
                    method: 'POST',
                    body: formData
                });
            });
        });
    </script>
</body>
</html>
