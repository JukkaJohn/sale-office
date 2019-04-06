<!DOCTYPE html> <html lang="nl">
<head>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
<title>Bestelling wijzigen</title> </head>
<body>
<?php
        
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite'); 
// De update opdracht
$sql = "UPDATE Bestelregel
    SET BestelNummer = :bestelnummer,   
    BesteldAantal = (SELECT BesteldAantal FROM Bestelregel WHERE ProductCode = :productcode) + :besteldaantal
    WHERE ProductCode = :productcode";
$stmt = $db->prepare($sql);

$stmt->bindParam(':bestelnummer', $bestelnummer);
$bestelnummer = $_POST['bestelnummer'];

$stmt->bindParam(':besteldaantal', $besteldaantal);
$besteldaantal = $_POST['besteldaantal'];

$stmt->bindParam(':productcode', $productcode);
$productcode = $_POST['productcode'];
    
$resultaat = $stmt->execute();
    
    $sql = "UPDATE Product
    SET Voorraad = (SELECT Voorraad FROM Product WHERE ProductCode = :productcode) - :besteldaantal 
    WHERE ProductCode = :productcode";
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':productcode', $productcode);
$productcode = $_POST['productcode'];
    
    $stmt->bindParam(':besteldaantal', $besteldaantal);
$besteldaantal = $_POST['besteldaantal'];
    
    $resultaat = $stmt->execute();
    
// De wijziging bekijken
$sql = "SELECT * FROM Bestelregel WHERE ProductCode = :productcode"; 
$stmt = $db->prepare($sql);
$stmt->bindParam(':productcode', $productCode);
$productCode = $_POST['productcode'];
$stmt->execute(); 
$resultaat = $stmt->fetchAll(); 
foreach($resultaat as $row) {
    echo '<p>';
    echo 'BestelNummer: '.$row['BestelNummer'].'<br>'; 
    echo 'ProductCode: '.$row['ProductCode'].'<br>';
    echo 'BesteldAantal: '.$row['BesteldAantal'].'<br>';
    echo '</p>';
}
echo "<p>is nu gewijzigd!</p>";
echo "<p><form action='klantinloggen.php' method='post'>
<input type='submit' name='submit' value='Terug'>
</form></p>"; 
$db = NULL;
?>
</body> 
</html>

