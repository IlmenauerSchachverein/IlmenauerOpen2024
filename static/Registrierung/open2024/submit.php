<?php
$error = false;
// Überprüfen, ob das Formular über POST übermittelt wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Eingabedaten aus dem Formular sichern und speichern
    $vorname = htmlspecialchars($_POST['vorname']);
    $nachname = htmlspecialchars($_POST['nachname']);
    $verein = isset($_POST['verein']) ? htmlspecialchars($_POST['verein']) : '';
    $fideID = htmlspecialchars($_POST['fideID']);
    $federation = htmlspecialchars($_POST['federation']);
    $geburtsjahr = htmlspecialchars($_POST['geburtsjahr']);
    $handy = htmlspecialchars($_POST['handy']);
    $email = htmlspecialchars($_POST['email']);
    $rabatt = htmlspecialchars($_POST['rabatt']);
    $bestaetigung = isset($_POST['bestaetigung']) ? 'Ja' : 'Nein';
    $agb = isset($_POST['agb']) ? 'Ja' : 'Nein';

    // Anmeldedatum und Uhrzeit im gewünschten Format
    $anmeldedatum = date('d-m-Y'); // DD-MM-YYYY
    $uhrzeit = date('H:i:s');      // HH:MM:SS

    // Dateipfad zur CSV-Datei
    $dateipfad = '/var/private/isv/open2024.csv';

    // Test ob FIDE ID eine ID ist 
    if (ctype_digit($fideID)) {
        echo "";
    } else {
        echo "<p style='color:red;'><strong>Fehler:</strong> Bitte überprüfen Sie ihre FIDE ID.</p>";
        $error = true;
    }

    if ($error == false) {
        // Öffnen der Datei im Anhängemodus
        if (($datei = fopen($dateipfad, 'a')) !== FALSE) {
            // Datenzeile, die in die CSV-Datei geschrieben wird
            $datenzeile = [
                $anmeldedatum,
                $uhrzeit,
                $vorname,
                $nachname,
                $verein,
                $fideID,
                $federation,
                $geburtsjahr,
                $handy,
                $email,
                $rabatt,
                $bestaetigung,
                $agb
            ];

            // Schreiben der Datenzeile in die CSV-Datei
            if (fputcsv($datei, $datenzeile) === FALSE) {
                echo "<p style='color:red;'><strong>Fehler:</strong> Daten konnten nicht in die CSV-Datei geschrieben werden.</p>";
            }

            // Schließen der Datei
            fclose($datei);
        } else {
            echo "<p style='color:red;'><h1><strong>Fehler:</strong> CSV-Datei konnte nicht geöffnet oder erstellt werden. Überprüfen Sie den Dateipfad und die Berechtigungen.</p></h1>";
        }
    }
}


// Ausgabe

echo '<style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>';

echo '<table>';
echo '<tr><th>Feld</th><th>Wert</th></tr>';
echo '<tr><td>Vorname</td><td>' . $vorname . '</td></tr>';
echo '<tr><td>Nachname</td><td>' . $nachname . '</td></tr>';
echo '<tr><td>Verein</td><td>' . $verein . '</td></tr>';
echo '<tr><td>FIDE ID</td><td>' . $fideID . '</td></tr>';
echo '<tr><td>Schachföderation</td><td>' . $federation . '</td></tr>';
echo '<tr><td>Geburtsjahr</td><td>' . $geburtsjahr . '</td></tr>';
echo '<tr><td>Handynummer</td><td>' . $handy . '</td></tr>';
echo '<tr><td>E-Mail-Adresse</td><td>' . $email . '</td></tr>';
echo '<tr><td>Rabattberechtigung</td><td>' . $rabatt . '</td></tr>';
echo '<tr><td>Bestätigung gewünscht</td><td>' . $bestaetigung . '</td></tr>';
echo '<tr><td>AGB Zustimmung</td><td>' . $agb . '</td></tr>';
echo '</table>';
?>
