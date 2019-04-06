<?php session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
header("location:Klant.php");
exit;
}
?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="style.css" />
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Een Bestelling wijzigen</title>
</head>

<body>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px"> </header>
    <div>
        <h3>Gefeliciteerd! Het is gelukt om in te loggen. </h3>
    </div>



<?php echo date("d-m-Y, G:i");?>
<br>
<h2>Wat wilt u gaan doen?</h2>
<ul>
    <li>
        <a href="bestellingbekijken.php"> 
Bestelling bekijken/wijzigen/verwijderen/toevoegen</a>
    </li> <br>
</ul>
<div>
    <a href="Klant.php">
        <h3>Klik hier</a> om uit te loggen.</h3>
</div><br><br>
    <footer>
        <p style="width: 200px; float: left">Copyright® 2019</p>
        <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
    </footer>
    </body>
</html>