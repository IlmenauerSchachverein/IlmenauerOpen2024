
<?php
// not ready
exit(0);


$error = false; 
$domain = "https://open24.ilmenauer-schachverein.de/";





// Wenn ein Fehler passiert ist, leite auf die Fehler-Seite um
if ($error) {
    header("Location: " . $domain . "failure");
    exit(); 
} else {
    header("Location: " . $domain . "success");
    exit(); 
}

?>