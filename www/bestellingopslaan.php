<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Een bestelling toevoegen</title>
</head>

<body>
    <?php
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite'); // De SQL opdracht
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$db->beginTransaction();

$sql = "INSERT INTO Bestelling SELECT MAX( BestelNummer ) + 1, CURRENT_TIMESTAMP, :klant, :bedrijf 
FROM Bestelling";

$stmt = $db->prepare($sql);
    
$stmt->bindParam(':klant', $klant);
$klant = $_SESSION['UserData']['Username'];
    
$stmt->bindParam(':bedrijf', $bedrijf);
$bedrijf = $_SESSION['UserData']['Bedrijfsnaam'];

    
$resultaat = $stmt->execute();
    
    
// Invoegen in Bestelregel
for( $i = 1; $i<=7; $i++ ) {
    $productInputname = 'productcode_' . $i;
    $aantalInputname = 'aantal_' . $i;
    
    // als productnaam en aantal dan doe update
    if ($_POST[$productInputname] != '' && $_POST[$aantalInputname] > 0) {
        echo 'Productcode: ' . $i . ': ' . $_POST[$productInputname] . ', aantal: ' . $_POST[$aantalInputname] . '<br/>';
        $sql = "INSERT INTO Bestelregel SELECT MAX ( BestelNummer ) + 1, :productcode_, :aantal_ FROM Bestelregel ";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':productcode_', $productcode);
        $productcode = $_POST[$productInputname];

        $stmt->bindParam(':aantal_', $besteldaantal);
        $besteldaantal = $_POST[$aantalInputname];

        $resultaat = $stmt->execute();
        
         $sql = "UPDATE Product SET Voorraad = (SELECT Voorraad FROM Product WHERE ProductCode = :productcode_) - :aantal_ WHERE ProductCode = :productcode_";
        
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':productcode_', $productInputname);
        $productInputname = $_POST[$productInputname];

        $stmt->bindParam(':aantal_', $aantalInputname);
        $aantalInputname = $_POST[$aantalInputname];

        $resultaat = $stmt->execute();
        
        $db->commit();

        
    }
}
    
// Controle van de toegevoegde gegevens
$sql = "SELECT * FROM Bestelregel WHERE ProductCode IS :productcode_ AND BesteldAantal IS :aantal_ ";
$stmt = $db->prepare($sql);

$stmt->bindParam(':productcode_', $productCode);
$productCode = $_POST[$productInputname];

$stmt->bindParam(':aantal_', $besteldaantal);
$besteldaantal = $_POST[$aantalInputname];
$resultaat = $stmt->execute();


if ($resultaat) {
    while ($row = $stmt->fetch()) {
        echo '<p>';
        echo 'ProductCode: '.$row['ProductCode'].'<br>';
        echo 'BesteldAantal: '.$row['BesteldAantal'].'<br>'; 
        echo '</p>';
    }
}
   
    
    
echo "<p>is toegevoegd!</p>";
echo "<p><form action='klantinloggen.php' method='post'>
<input type='submit' name='submit' value='Terug'>
</form></p>"; 
$db = NULL;
?>
</body>

</html>
