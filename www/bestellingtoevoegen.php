<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title> Bestelling invoeren</title>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:300px"></header>
</head>

<body>
    <h2> Hier kunt u een bestelling plaatsen</h2>
    <form action="bestellingopslaan.php" method="post">

        <p>
            <h2>
                Klant: <br>
                <?php  
            echo $_SESSION['UserData']['Username']; ?>
            </h2>
        </p>
        <p>
            <h2>
                Bedrijf: <br>
                <?php  
            echo $_SESSION['UserData']['Bedrijfsnaam']; ?> </h2>
        </p>


        <p>

        </p>
        <label><h3> &nbsp;&nbsp;&nbsp;&nbsp;Bestelling plaatsen</h3></label>
        <br>
        <input type="checkbox" name="productcode_1" value="JJ83"> <img id="leuk" src="assets/balpen1.png" alt="saleoffice" style="width:300px">€2,10 - <input type="number" min="1" name="aantal_1" /><br>
        <input type="checkbox" name="productcode_2" value="NA256"> <img id="leuk" src="assets/potlood1.jpg" alt="saleoffice" style="width:300px">€1,00 - <input type="number" name="aantal_2" /><br>
        <input type="checkbox" name="productcode_3" value="XX24"> <img id="leuk" src="assets/vulpeninkt.jpg" alt="saleoffice" style="width:300px">€8,35 - <input type="number" name="aantal_3" /><br>
        <input type="checkbox" name="productcode_4" value="NB221"> <img id="leuk" src="assets/papier.jpg" alt="saleoffice" style="width:300px"> €3,20- <input type="number" name="aantal_4" /><br>
        <input type="checkbox" name="productcode_5" value="XX24"> <img id="leuk" src="assets/vulpeninktt.jpg" alt="saleoffice" style="width:300px"> - €9,00<input type="number" name="aantal_5" /><br>
        <input type="checkbox" name="productcode_6" value="AAP"> <img id="leuk" src="assets/noot.png" alt="saleoffice" style="width:300px"> €100,00 <input type="number" name="aantal_6" /><br>
        <input type="checkbox" name="productcode_7" value="NB222" checked> <img id="leuk" src="assets/papier.jpeg" alt="saleoffice" style="width:300px"> - €2,70<input type="number" name="aantal_7" /><br><br>
        <input type="submit" value="Plaats bestelling"></form>

<?php echo "<p><form action='klantinloggen.php' method='post'> 
<input type='submit' value='Terug'> </form></p>"; ?><br><br>
    <footer>
        <p style="width: 200px; float: left">Copyright® 2019</p>
        <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
    </footer>
</body>

</html>
