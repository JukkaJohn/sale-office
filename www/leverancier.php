<?php
session_start();

   if(isset($_POST['Submit'])){
      $logins = array('PapierBV' => array('LEV72','LEV72'),'J.KantoorBV' => array('LEV73','LEV73'),'StumpelBV' => array('LEV25','LEV25'),'VulpenBV' => array('LEV45','LEV45'),'BaconBV' => array('LEV99','LEV99'),'PapierBV' => array('LEV72','LEV72'));
       $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
       $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

 if (isset($logins[$Username]) && $logins[$Username][0] == $Password) {
        $_SESSION['UserData']['Username']=$Username;
        $_SESSION['UserData']['LeverancierCode']=$logins[$Username][1];
header("location:levinloggen.php");
exit;
} else {
$msg="<span style='color:red'>Probeer het opnieuw!</span>";
}
}
?>


<! DOCTYPE html>
<html lang="nl">

<head>


    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>
        Leverancier
    </title>

    <body>
        <header id="bovenste">
            <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px">
            <h1>Leveranciers</h1>
            <nav id="menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="http://localhost:8080/leverancier.php">Leveranciers</a></li>
                    <li><a href="http://localhost:8080/Klant.php">Klanten</a></li>
                    <li><a href="OverOns.html">Over Ons</a></li>
                    <li><a href="Contact.html">Contact</a></li>
                </ul>
            </nav>
            <div class="grid-container">
                <div class="grid-item">
                    <form action="" method="post" name="Login_Form">
                        <table width="400" border="0" align="left" cellpadding="3 " cellspacing="1" class="Table">
                            <?php if(isset($msg)){?>
                            <tr>
                                <td colspan="2" align="center" valign="top">
                                    <?php echo $msg;?>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2" align="left" valign="top">
                                    <h3>Login</h3>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" valign="top">Username</td>
                                <td><input name="Username" type="text" class="Input" value="StumpelBV"></td>
                            </tr>
                            <tr>
                                <td align="right">Password</td>
                                <td><input name="Password" type="password" class="Input" value="LEV25"></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <h3>Dit is de pagina voor leveranciers.<br> Als u deze website bezoekt omdat u werkt bij een leverancier, kunt u hier inloggen. <br> Als u heeft ingelogd, dan kunt u producten wijzigen, verwijderen of toevoegen in de database. Klanten kunnen deze producten dan ook bestellen. <br> Als u vragen heeft over de werking van ons systeem, of snapt u niet hoe u uw assortiment kan aanpassen in de database, kunt u contact opnemen met SaleOffice. Druk dan op de pagina Contact.
            </h3>
            <h3></h3>
            <h3> Hopelijk diende uw ruim geïnformeerd te hebben. <br> <br>Hieronder een aantal trouwe leveranciers die SaleOffice al sinds de ondergang van de boreale wereld producten aanbieden binnen ons bedrijf:</h3>
            <div class="grid-container">
                <div class="grid-item">
                    <img id="large" src="assets/papier.jpeg">
                </div>
                <div class="grid-item">
                    <h3>Papier BV levert ecologisch verwantwoorde producten zoals schrijfblokken en vulpeninkt.</h3>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">
                    <img id="large" src="assets/stumpel.png">
                </div>
                <div class="grid-item">
                    <h3>Stumpel BV levert gesecuraliseerd papier van manische kwaliteit</h3>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item">
                    <img id="large" src="assets/VulpenBV.jpg">
                </div>
                <div class="grid-item">
                    <h3>Vulpen BV levert balpennen, potloden en vulpeninkt. Door deze leverancier kunnen klanten hun creatieve gedachtenkronkels op een masochistische manier noteren.</h3>
                </div>
            </div>

            <footer>
                <p style="width: 200px; float: left">Copyright® 2019</p>
                <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
            </footer>


        </header>

    </body>
</head>

</html>
