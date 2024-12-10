<?php
require 'vendor/autoload.php'; // PhpSpreadsheet autoload

use PhpOffice\PhpSpreadsheet\IOFactory;

// SQLite Database Connection
$db = new SQLite3('race_data.db');

// Define the fixed file path for the Excel file
$filePath = '/home/arkatosh/Documents/Code/GIT/RaceDaysWeb/Files/RaceDays2024.xlsx';

// Check if the file exists
if (!file_exists($filePath)) {
    die("Error: The specified file '{$filePath}' does not exist!");
}

try {
    // Load the Excel file
    $spreadsheet = IOFactory::load($filePath);

    // Startdatum und Enddatum festlegen
    //$startDate = new DateTime('2025-01-02'); // Startdatum für Tag 1
    //$endDate = new DateTime('2025-01-05');   // Enddatum (Tag 4)

    $startDate = new DateTime('2024-12-10'); // Startdatum für Tag 1
    $endDate = new DateTime('2025-01-14');   // Enddatum (Tag 4)

    // Heutiges Datum prüfen
    $currentDate = new DateTime();

    if ($currentDate < $startDate || $currentDate > $endDate) {
        throw new Exception("No matching sheet for today's date: " . $currentDate->format('d.m.Y'));
    }

    // Berechnen, welcher Tag heute ist
    $dayDiff = $currentDate->diff($startDate)->days + 1; // Differenz in Tagen (Tag 1 = Startdatum)
    $sheetName = "Tag $dayDiff"; // Beispiel: "Tag 1", "Tag 2", ...

    // Sheet mit dem berechneten Namen laden
    $sheet = $spreadsheet->getSheetByName($sheetName);
    if (!$sheet) {
        throw new Exception("Sheet with name '$sheetName' not found!");
    }

    $data = $sheet->toArray(null, true, true, true);

    // Display the Excel data for debugging
    echo "<h2>Excel Data Preview</h2>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>Geplante Startzeit</th> <th>Aktuelle Startzeit</th><th>No</th><th>Bahn</th><th>Vorname</th><th>Name</th><th>M/W</th><th>Alter</th><th>Bestzeit</th></tr>";

    // Clear the database before inserting new data
    $db->exec("DELETE FROM race_table");

    foreach ($data as $rowIndex => $row) {
        // Skip the header row (index 1)
        if ($rowIndex === 1) continue;

        // Debug: Display each row being processed
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

        if (!$result) {
            echo "<p>Error inserting row {$rowIndex}: " . $db->lastErrorMsg() . "</p>";
        }
    }

    echo "</table>";
    echo "<p>Data has been successfully saved into the database!</p>";

} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>