<?php session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
header("location:leverancier.php");
exit;
}
?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Producten</title>
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
        <a href="levbekijken.php"> 
Producten bekijken/wijzigen/verwijderen</a>
    </li> <br>
    <li>
        <a href="levtoevoegen.php"> Producten toevoegen</a> </li>
</ul>
<div>
    <a href="logout.php">
        <h3>Klik hier</a> om uit te loggen.</h3>
</div>
    </body><br><br>
<footer>
        <p style="width: 200px; float: left">Copyright® 2019</p>
        <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
    </footer></html>