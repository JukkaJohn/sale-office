<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Producten wijzigen</title>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px"></header>
</head>

<body>
    <h2>Hier kunt u een door u leverbaar product wijizgen</h2>
    <?php
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite');
// De SQL opdracht
// Hier wordt de leverancier geselecteerd om de gegevens op
// te halen die je wilt wijzigen. De leveranciercode zit
// in $_POST[verstopt]

$sql = "SELECT * FROM Product WHERE ProductCode = ?"; 
$stmt = $db->prepare($sql);
$stmt->execute([$_POST['verstopt']]);
$resultaat = $stmt->fetchAll();
// De leveranciergegevens worden in variabelen gestopt zodat
// we ze in het formulier kunnen zien
foreach($resultaat as $row) {
    $productcode = $row['ProductCode']; 
    $omschrijving = $row['Omschrijving'];
    $inkoopprijs = $row['Inkoopprijs'];
    $verkoopprijs = $row['Verkoopprijs']; 
    $voorraad = $row['Voorraad'];
}
// Sluiten van verbinding
$db = NULL;
echo "<form action='levwijzigdefinitief.php' method='post'>
<p>Productcode: <br>
<input name='productcode' type='text' size='30' value=$productcode tabindex='1' readonly/>
</p>
<p>Omschrijving: <br>
<input name='omschrijving' type='text' size='30' value=$omschrijving tabindex='2'/>
</p>
<p>Inkoopprijs: <br>
<input name='inkoopprijs' type='text' size='30' value=$inkoopprijs tabindex='3'/>
</p>
<p>Verkoopprijs: <br>
<input name='verkoopprijs' type='text' size='30' value=$verkoopprijs tabindex='4'/>
</p>
<p>Voorraad: <br>
<input name='voorraad' type='text' size='30' value=$voorraad tabindex='5'/>
</p>
<p><input type='submit' name='submit'  value='Wijzig' title='Verstuur dit formulier' tabindex='7'>

</p>
</form>";
    echo "<p><form action='levinloggen.php' method='post'> 
<input type='submit' name='verwijdernee' value='Terug'> </form></p>"; 
?>
        <footer>
            <p style="width: 200px; float: left">Copyright® 2019</p>
            <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
        </footer>
</body>

</html>
