<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Bestelling</title>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px"></header>
</head>

<body>
    <h2>Hier kunt u uw bestelling verwijderen</h2>
    <?php
// Maken van verbinding
    
$db = new PDO('sqlite:kantoor.sqlite');
/// De SQL opdracht
// Hier wordt de leverancier geselecteerd om de gegevens op
// te halen die je wilt verwijderen. De leveranciercode zit
// in $_POST[verstopt]

echo '<p>';
echo 'ProductCode: '.$_POST['productcode'].'<br>';
echo 'BestelNummer: '.$_POST['bestelnummer'].'<br>';
echo 'BesteldAantal: '.$_POST['besteldaantal'].'<br>';
echo '</p>';
 //---------------------------------------------------------------------------------------------------------------------------------------

$productcode = $_POST['productcode'];
$bestelnummer = $_POST['bestelnummer'];
$besteldaantal = $_POST['besteldaantal'];    
    
    
echo "<p>
<form action='bestellingdefinitiefverwijderen.php' method='post'>  
Weet u zeker dat u deze bestelling wilt verwijderen? <br><br>
<input type='hidden' name='productcode' value=$productcode>
<input type='hidden' name='bestelnummer' value=$bestelnummer>
<input type='hidden' name='besteldaantal' value=$besteldaantal>
<input type='submit' name='verwijderja' value='Verwijder deze bestelling'> </form></p>";
echo "<p><form action='klantinloggen.php' method='post'> 
<input type='submit' name='verwijdernee' value='Nee, verwijder niet!'> </form></p>";
 

// Sluiten van verbinding
$db = NULL;
?><br><br>
        <footer>
            <p style="width: 200px; float: left">Copyright® 2019</p>
            <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
        </footer>
</body>

</html>
