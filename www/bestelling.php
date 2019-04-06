<!DOCTYPE html> <html lang="nl">
<head>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
<title>Bestelling</title> </head>
<body>
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
echo 'ProductCode: '.$row['ProductCode'].'<br>'; echo 'Omschrijving: '.$row['Omschrijving'].'<br>';
echo 'Inkoopprijs: '.$row['Inkoopprijs'].'<br>';
echo 'Verkoopprijs: '.$row['Verkoopprijs'].'<br>';
echo 'Voorraad: '.$row['Voorraad'].'<br>'; 
echo '</p>';
}
echo "<p>
<form action='levdefinitiefverwijderen.php' method='post'> Weet u zeker dat u deze leverancier wilt verwijderen? <input type='hidden' name='verstopt' value=$code>
<input type='submit' name='verwijderja' value='Ja'> </form></p>";
echo "<p><form action='crud_menu.php' method='post'> <input type='submit' name='verwijdernee' value='Terug'> </form></p>";
// Sluiten van verbinding
$db = NULL;
?>
</body> </html>