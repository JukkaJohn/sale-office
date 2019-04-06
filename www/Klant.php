<?php

session_start();  /* Starts the session */

if(isset($_POST['Submit'])) {
    $logins = array('H.Kral' => array('99023', 'Shell'),'J.Golp' => array('99025', 'Advocatenbureau Golp'),'P.de jong' => array('99024', 'OSG West-Friesland'));
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    if (isset($logins[$Username]) && $logins[$Username][0] == $Password) {
        $_SESSION['UserData']['Username']=$Username;
        $_SESSION['UserData']['Bedrijfsnaam']=$logins[$Username][1];
        header("location:klantinloggen.php");
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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>
        Klant </title>
    <link rel="shortcut icon" href="assets/Canada.png" type="image/x-icon" />
</head>

<body>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px">
        <h1>Klanten</h1>

        <nav id="menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="http://localhost:8080/leverancier.php">Leveranciers</a></li>
                <li><a href="http://localhost:8080/Klant.php">Klanten</a></li>
                <li><a href="OverOns.html">Over Ons</a></li>
                <li><a href="Contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="grid-container">
        <div class="grid-item">
            <form action="" method="post" name="Login_Form">
                <table width="400" border="0" align="left" cellpadding="5" cellspacing="1" class="Table">
                    <?php if(isset($msg)){?>
                    <tr>
                        <td colspan="2" align="center" valign="top">
                            <?php echo $msg;?>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" align="left" valign="top">
                            <h2>Login</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="top">Username</td>
                        <td><input name="Username" type="text" class="Input" value="H.Kral"></td>
                    </tr>
                    <tr>
                        <td align="right">Password</td>
                        <td><input name="Password" type="password" class="Input" value="99023"></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>




    <h2>Dit is de pagina voor klanten. Klanten kunnen hier inloggen. Wanner zij deze taak met succes hebben volbracht. Kunnen zij een bestelling plaatsen. Als zij zich bedenken kunnen zij deze bestelling wijzigen of verwijderen. </h2>

    <h2> Als u vragen heeft over de werking van ons systeem, of snapt u niet hoe u een bestelling kan plaatsen, kunt u contact opnemen met SaleOffice. Druk dan op de pagina Contact.
    </h2>
    <h2>Hieronder ziet u een aantal producten die van levensbelang zijn op het kantoor. Wanneer deze producten niet op voorraad zijn op uw kantoor, kan dit volgens Rousseau tot een verdere vervreemding van de menselijke natuurtoestand leiden</h2>
    <div class="grid-container">
        <div class="grid-item">
            <img id="large" src="assets/vulpeninkt.jpg">
        </div>
        <div class="grid-item">
            <h3> Dit is een potje met vulpeninkt. Om het genot van schrijven te bevredigen is vulpeninkt noodzakelijk.</h3>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-item">
            <img id="large" src="assets/waterman.jpg">
        </div>
        <div class="grid-item">
            <h3><h3>Dit is niet zomaar een pen, dit is een pen die schrijven een genot voor de hand maakt.</h3>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-item">
            <img id="large" src="assets/papier.jpg">
        </div>
        <div class="grid-item">
            <h3>Als u gereed bent om te schrijven, wilt u schrijven op een zijdezacht oppervlak. Dit papier is daarvoor bedoeld.</h3>
        </div>
    </div>



    <footer>
        <p style="width: 200px; float: left">Copyright® 2019</p>
        <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
    </footer>
</body>

</html>
