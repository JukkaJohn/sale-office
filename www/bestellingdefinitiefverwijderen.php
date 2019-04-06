<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Bestelling verwijderen</title>
</head>

<body>
    <?php
// Maken van verbinding
    
$db = new PDO('sqlite:kantoor.sqlite');

echo 'ProductCode: '.$_POST['productcode'].'<br>';     


echo 'ProductCode: '.$_POST['productcode'].'<br>';
echo 'BestelNummer: '.$_POST['bestelnummer'].'<br>';
echo 'BesteldAantal: '.$_POST['besteldaantal'].'<br>';
echo '</p>';
  

    $sql = "DELETE FROM Bestelregel WHERE ProductCode = :productcode AND BestelNummer = :bestelnummer"; 
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':productcode', $productCode);
    $productCode = $_POST['productcode'];
    $stmt->bindParam(':bestelnummer', $bestelNummer);
    $bestelNummer = $_POST['bestelnummer'];
    $resultaat = $stmt->execute();
    
    $sql = "UPDATE Product
    SET Voorraad = (SELECT Voorraad FROM Product WHERE ProductCode = :productcode) + :besteldaantal 
    WHERE ProductCode = :productcode";
    
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':productcode', $productcode);
$productcode = $_POST['productcode'];
    
    $stmt->bindParam(':besteldaantal', $besteldaantal);
$besteldaantal = $_POST['besteldaantal'];
    
    $resultaat = $stmt->execute();
    
    
    
echo "<p>is nu verwijderd!</p>";
echo "<p><form action='klantinloggen.php' method='post'>
<input type='submit' name='submit' value='Terug'>
</form></p>";
// Sluiten van verbinding
$db = NULL;
?>
</body>

</html>
