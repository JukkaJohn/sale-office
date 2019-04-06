<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Product verwijderen</title>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px"></header>
</head>

<body>
    <h2>Als u niet meer in staat bent om een prpduct te leveren, kunt u dit product hier verwijderen</h2>
    <?php
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite');
/// De SQL opdracht
// Hier wordt de leverancier geselecteerd om de gegevens op
// te halen die je wilt verwijderen. De leveranciercode zit
// in $_POST[verstopt]
$sql = "SELECT * FROM Product WHERE productCode = ?"; $stmt = $db->prepare($sql);
$stmt->execute([$_POST['verstopt']]);
$resultaat = $stmt->fetchAll();
foreach($resultaat as $row) {
echo '<p>';
$code = $row['ProductCode'];
echo 'ProductCode: '.$row['ProductCode'].'<br>'; 
echo 'Omschrijving: '.$row['Omschrijving'].'<br>';
echo 'Inkoopprijs: '.$row['Inkoopprijs'].'<br>';
echo 'Verkoopprijs: '.$row['Verkoopprijs'].'<br>';
echo 'Voorraad: '.$row['Voorraad'].'<br>'; 
echo '</p>';
}
echo "<p>
<form action='levdefinitiefverwijderen.php' method='post'> 
Weet u zeker dat u dit product wilt verwijderen? <br>
<input type='hidden' name='verstopt' value=$code>
<input type='submit' name='verwijderja' value='Verwijder'> </form></p>";
echo "<p><form action='levinloggen.php' method='post'> <input type='submit' name='verwijdernee' value='Nee, verwijder niet!'> </form></p>";
// Sluiten van verbinding
$db = NULL;
?><br><br>
        <footer>
            <p style="width: 200px; float: left">Copyright® 2019</p>
            <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
        </footer>
</body>

</html>
