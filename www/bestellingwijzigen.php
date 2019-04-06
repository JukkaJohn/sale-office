<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Bestelling wijzigen</title>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px"></header>
</head>

<body>
    <h2> Wijzig hier uw bestelling</h2>
    <?php
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite');
// De SQL opdracht
// Hier wordt de leverancier geselecteerd om de gegevens op
// te halen die je wilt wijzigen. De leveranciercode zit
// in $_POST[verstopt]

$sql = "SELECT * FROM Bestelregel WHERE ProductCode = ?"; 
$stmt = $db->prepare($sql);
$stmt->execute([$_POST['verstopt']]);
$resultaat = $stmt->fetchAll();
// De leveranciergegevens worden in variabelen gestopt zodat
// we ze in het formulier kunnen zien
foreach($resultaat as $row) {
    $productcode = $row['ProductCode'];
    $bestelnummer = $row['BestelNummer']; 
    $besteldaantal = $row['BesteldAantal']; 
}
// Sluiten van verbinding
$db = NULL;
     
echo "<form action='bestellingwijzigdefinitief.php' method='post'>
<p>Bestelnummer: <br>
<input name='bestelnummer' type='text' size='30' value=$bestelnummer tabindex='1' readonly/>
</p>
<p>ProductCode: <br>
<input name='productcode' type='text' size='30' value=$productcode tabindex='2'/>
</p>
<p>Extra Aantal: <br>
<input name='besteldaantal' type='text' size='30' value=$besteldaantal tabindex='3'/>
</p>
<p><input type='submit' name='submit'  value='Wijzig' title='Verstuur dit formulier' tabindex='5'>
</p>
</form>";
    echo "<p><form action='klantinloggen.php' method='post'> 
<input type='submit' name='verwijdernee' value='Terug'> </form></p>";
 
?><br><br>
        <footer>
            <p style="width: 200px; float: left">Copyright® 2019</p>
            <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
        </footer>
</body>

</html>
