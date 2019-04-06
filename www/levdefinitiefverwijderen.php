<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Product verwijderen</title>
</head>

<body>
    <?php
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite');
/// Hier wordt het bier geselecteerd om de gegevens op
// te halen die je wilt verwijderen
    
$sql = "SELECT * FROM Product WHERE ProductCode = ?"; $stmt = $db->prepare($sql);
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
$sql = "DELETE FROM Product WHERE ProductCode = ?"; $stmt = $db->prepare($sql); $stmt->execute([$row['ProductCode']]);
echo "<p>is nu verwijderd!</p>";
echo "<p><form action='levinloggen.php' method='post'>
<input type='submit' name='submit' value='Terug'>
</form></p>";
// Sluiten van verbinding
$db = NULL;
?>
</body>

</html>
