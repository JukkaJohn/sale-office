<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Het Bestellingsoverzicht</title>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px"></header>
</head>

<body>
    <h1>Bestellingen wijizgen of verwijderen</h1>
    <h3>Hieronder ziet u alle bestellingen  <br>Als u één of meer bestellingen wil plaatsen, kunt u dat hier doen. <br>Ook als u uw bestelling wilt wijzigen of verwijderen bent u aan het juiste adres</h3>
    <h5>Productcode &nbsp;&nbsp;&nbsp;&nbsp;BN* &nbsp;&nbsp;&nbsp;BA**</h5>
    <?php
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite'); // De SQL opdracht
$sql = 'SELECT * FROM Bestelregel'; $resultaat = $db->query($sql);
// De HTML-tabel opbouwen
echo '<table class="mooietabel" border=1 cellpadding="0" cellspaceing="0">'; 
    foreach($resultaat as $row) {
echo '<tr>';
$productcode = $row['ProductCode'];
$bestelnummer = $row['BestelNummer'];
$besteldaantal = $row['BesteldAantal'];
echo '<td>'.$row['ProductCode'].'</td>';
echo '<td>'.$row['BestelNummer'].'</td>';
echo '<td>'.$row['BesteldAantal'].'</td>';
echo "<td><form action='bestellingwijzigen.php' method='post'>
<input type='hidden' name='verstopt' value=$productcode>
<input type='submit' name='wijzig' value='wijzig'> </form></td>";
echo "<td><form action='bestellingtoevoegen.php' method='post'>
<input type='hidden' name='verstopt' value=$bestelnummer>
<input type='submit' name='toevogen' value='toevoegen'> </form></td>";
echo "<td><form action='bestellingverwijderen.php' method='post'>
<input type='hidden' name='productcode' value=$productcode> 
<input type='hidden' name='bestelnummer' value=$bestelnummer>
<input type='hidden' name='besteldaantal' value=$besteldaantal> 
<input type='submit' name='verwijder' value='verwijder'> </form></td>";
echo '</tr>'; }
echo '</table>';
     $db = NULL;
?>
        <h5>* Uw persoonlijke Bestelnummer</h5>
        <h5>** Besteldaantal per product</h5>



        <h2><a href="klantinloggen.php"> Terug naar homepagina </a></h2><br><br>
        <footer>
            <p style="width: 200px; float: left">Copyright® 2019</p>
            <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
        </footer>

</body>

</html>
