---
title: Nicht nutzen
type: docs
toc: false
---

# Test

<h1>  BITTE NICHT DAS FORMULAR NUTZEN. DAS IST NUR EIN TEST</h1>

<form action="https://register.ilmenauersv.xyz/open2024/submit.php" method="POST">
  <label>Vorname*</label><br>
  <input type="text" required name="vorname"><br>

<label>Nachname\*</label><br>
<input type="text" required name="nachname"><br>

<label>Verein (falls vorhanden) </label><br>
<input type="text" name="verein"><br>

<label>Fide-ID\*</label><br>
<input type="text" required name="fideID"><br>

<label>Schachföderation\* (z.B. Deutscher Schachbund)</label><br>
<input type="text" required name="federation"><br>

<label>Geburtsjahr\*</label><br>
<input type="text" required name="geburtsjahr"><br>

<label>Rabattberechtigt?</label><br>

  <input type="radio" id="nein" name="rabatt" value="nein" checked>
  <label for="nein">Nein.</label><br>
  <input type="radio" id="u18" name="rabatt" value="ja_U18">
  <label for="U18">U18 (Stichtag 01.01)</label><br>
  <input type="radio" id="student" name="rabatt" value="ja_Student">
  <label for="student">Student</label><br>
  <input type="radio" id="renter" name="rabatt" value="ja_Rentner">
  <label for="renter">Renter</label><br>

  <input type="submit" value="Submit">
</form>

## old