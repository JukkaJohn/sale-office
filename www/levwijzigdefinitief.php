<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Producten wijzigen</title>
</head>

<body>
    <?php
        
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite'); 
// De update opdracht
$sql = "UPDATE Product
    SET Omschrijving = :omschrijving,   
    Inkoopprijs = :inkoopprijs,
    Verkoopprijs = :verkoopprijs,
    Voorraad = :voorraad
    WHERE ProductCode = :productcode";
$stmt = $db->prepare($sql);
    
$stmt->bindParam(':omschrijving', $omschrijving);
$omschrijving = $_POST['omschrijving'];
    
$stmt->bindParam(':inkoopprijs', $inkoopprijs);
$inkoopprijs = $_POST['inkoopprijs'];
    
$stmt->bindParam(':verkoopprijs', $verkoopprijs);
$verkoopprijs = $_POST['verkoopprijs'];
      
$stmt->bindParam(':voorraad', $voorraad);
$voorraad = $_POST['voorraad'];
    
$stmt->bindParam(':productcode', $productcode);
$productcode = $_POST['productcode'];

$resultaat = $stmt->execute();
// De wijziging bekijken
$sql = "SELECT * FROM Product WHERE ProductCode = :productcode"; 
$stmt = $db->prepare($sql);
$stmt->bindParam(':productcode', $productCode);
$productCode = $_POST['productcode'];
$stmt->execute(); 
$resultaat = $stmt->fetchAll(); 
foreach($resultaat as $row) {
    echo '<p>';
    echo 'ProductCode: '.$row['ProductCode'].'<br>'; 
    echo 'Omschrijving: '.$row['Omschrijving'].'<br>';
    echo 'Inkoopprijs: '.$row['Inkoopprijs'].'<br>';
    echo 'Verkoopprijs: '.$row['Verkoopprijs'].'<br>';
    echo 'Voorraad: '.$row['Voorraad'].'<br>'; 
    echo '</p>';
}
echo "<p>is nu gewijzigd!</p>";
echo "<p><form action='levinloggen.php' method='post'>
<input type='submit' name='submit' value='Terug'>
</form></p>"; 
$db = NULL;
?>
</body>

</html>
