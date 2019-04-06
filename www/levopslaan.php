<?php  session_start(); ?>
<!DOCTYPE html> 
<html lang="nl">
<head>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
<title>Een Product toevoegen</title> </head>
<body>
<?php
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite'); // De SQL opdracht
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$db->beginTransaction();
    
$sql = "INSERT INTO Product (ProductCode, Omschrijving, Inkoopprijs, Verkoopprijs, Voorraad) VALUES (:productcode, :omschrijving, :inkoopprijs, :verkoopprijs, :voorraad)";
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
    
// Invoegen in KanLeveren
$sql = "INSERT INTO KanLeveren (LeverancierCode, ProductCode) VALUES (:leveranciercode, :productcode)";
$stmt = $db->prepare($sql);
    
$stmt->bindParam(':leveranciercode', $leveranciercode);
$leveranciercode = $_SESSION['UserData']['LeverancierCode'];
    
$stmt->bindParam(':productcode', $productcode);
$productcode = $_POST['productcode'];
    
$resultaat = $stmt->execute();
    
$db->commit();    
// Controle van de toegevoegde gegevens
$sql = "SELECT * FROM Product WHERE ProductCode IS :productcode;";
$stmt = $db->prepare($sql);
$stmt->bindParam(':productcode', $productCode);
$productCode = $_POST['productcode'];
$resultaat = $stmt->execute();


if ($resultaat) {
    while ($row = $stmt->fetch()) {
        echo '<p>';
        echo 'ProductCode: '.$row['ProductCode'].'<br>'; 
        echo 'Omschrijving: '.$row['Omschrijving'].'<br>';
        echo 'Inkoopprijs: '.$row['Inkoopprijs'].'<br>';
        echo 'Verkoopprijs: '.$row['Verkoopprijs'].'<br>';
        echo 'Voorraad: '.$row['Voorraad'].'<br>'; 
        echo '</p>';
    }
}
    
    
echo "<p>is toegevoegd!</p>";
echo "<p><form action='levinloggen.php' method='post'>
<input type='submit' name='submit' value='Terug'>
</form></p>"; $db = NULL;
?>
</body> </html>

