<?php
require 'vendor/autoload.php'; // PhpSpreadsheet autoload

use PhpOffice\PhpSpreadsheet\IOFactory;

// SQLite Database Connection
$db = new SQLite3('race_data.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excel_file'])) {
    $file = $_FILES['excel_file']['tmp_name'];

    // Debug: Check if the file exists
    if (!file_exists($file)) {
        die("Error: Uploaded file not found!");
    }

    try {
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, true, true, true);

        // Debug: Check the Excel data
        echo "<h2>Excel Data Preview (Debugging)</h2>";
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        // Clear the database before inserting new data
        $db->exec("DELETE FROM race_table");

        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr><th>Geplante Startzeit</th> <th>Aktuelle Startzeit</th><th>No</th><th>Bahn</th><th>Vorname</th><th>Name</th><th>M/W</th><th>Alter</th><th>Bestzeit</th></tr>";

        foreach ($data as $rowIndex => $row) {
            // Skip the header row (index 1)
            if ($rowIndex === 1) continue;

            // Debug: Check the current row being processed
            echo "<tr>
                    <td>{$row['A']}</td>
                    <td>{$row['B']}</td>
                    <td>{$row['C']}</td>
                    <td>{$row['D']}</td>
                    <td>{$row['E']}</td>
                    <td>{$row['F']}</td>
                    <td>{$row['G']}</td>
                    <td>{$row['H']}</td>
                    <td>{$row['I']}</td>
                  </tr>";

            // Insert into the database
            $stmt = $db->prepare("INSERT INTO race_table (startzeit_geplant, startzeit_tatsaechlich, no, bahn, vorname, name, mw, age, bestzeit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            if ($stmt === false) {
                die("Error: Failed to prepare statement!");
            }

            $stmt->bindValue(1, $row['A'], SQLITE3_TEXT);
            $stmt->bindValue(2, $row['B'], SQLITE3_TEXT);
            $stmt->bindValue(3, $row['C'], SQLITE3_INTEGER);
            $stmt->bindValue(4, $row['D'], SQLITE3_TEXT);
            $stmt->bindValue(5, $row['E'], SQLITE3_TEXT);
            $stmt->bindValue(6, $row['F'], SQLITE3_TEXT);
            $stmt->bindValue(7, $row['G'], SQLITE3_TEXT);
            $stmt->bindValue(8, $row['H'], SQLITE3_TEXT);
            $stmt->bindValue(9, $row['I'], SQLITE3_TEXT);

            $result = $stmt->execute();

            // Debug: Check if the insert was successful
            if (!$result) {
                echo "<p>Error inserting row {$rowIndex}: " . $db->lastErrorMsg() . "</p>";
            }
        }
        echo "</table>";
        echo "<p>Data has been successfully saved into the database!</p>";

    } catch (Exception $e) {
        // Debug: Catch any exceptions during file loading or processing
        die("Error: " . $e->getMessage());
    }
} else {
    echo "No file uploaded.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Excel File</title>
</head>
<body>
    <h1>Upload Excel File</h1>
    <form action="" method="POST" enctype="multipart/form-data" id="auto-upload-form">
        <input type="hidden" name="excel_file" id="excel_file" value="RaceDays2024.xlsx">
    </form>

    <script>
        // Automatically submit the form after the page loads
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('auto-upload-form').submit();
        });
    </script>
</body>
</html>
