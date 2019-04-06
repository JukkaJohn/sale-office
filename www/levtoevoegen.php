<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title> Product invoeren</title>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px"></header>
</head>

<body>
    <h2>Hier kunt u nieuwe producten toevoegen</h2>
    <form action="levopslaan.php" method="post">
        <p>
            Productcode: <br>
            <input name="productcode" type="text" size="30" tabindex="1"> </p>
        <p>
            Omschrijving: <br>
            <input name="omschrijving" type="text" size="30" tabindex="2"> </p>
        <p>
            Inkoopprijs: <br>
            <input name="inkoopprijs" type="text" size="30" tabindex="3"> </p>
        <p>
            Verkooppijs: <br>
            <input name="verkoopprijs" type="text" size="7" tabindex="4"> </p>
        <p>
            Voorraad: <br>
            <input name="voorraad" type="text" size="30" tabindex="5"> </p>
        <p>
            <h2>
                
                    Leveranciercode: <br>
                    <?php  
            echo $_SESSION['UserData']['LeverancierCode']; ?>
            </h2>
        </p>
            <p>
                <input type="submit" name="submit" value="Toevoegen" ▬► title="Verstuur dit formulier" tabindex="7">
            </p>
    </form>
    <?php echo "<p><form action='levinloggen.php' method='post'> 
<input type='submit' name='verwijdernee' value='Terug'> </form></p>";?>
    <footer>
        <p style="width: 200px; float: left">Copyright® 2019</p>
        <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
    </footer>
</body>

</html>
