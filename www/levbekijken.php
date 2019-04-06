<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="shortcut icon" href="assets/saleoffice.png" />
    <title>Het Productenoverzicht</title>
    <header id="bovenste">
        <img src="assets/saleoffice.png" alt="saleoffice.png" style="width:150px"></header>
</head>

<body>
    <h1>Producten wijizgen of verwijderen</h1>
    <h3>Hieronder ziet u alle producten die worden geleverd. <br>Als u een product wil wijzigen of verwijderen kunt u dat doen door op wijzigen of verwijderen te drukken.</h3>
    <h5>Productcode Omschrijving &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IP* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VP** &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VR***</h5>
    <?php
// Maken van verbinding
$db = new PDO('sqlite:kantoor.sqlite'); // De SQL opdracht
$sql = 'SELECT * FROM Product'; $resultaat = $db->query($sql);
// De HTML-tabel opbouwen
echo '<table class="mooietabel" border=1 cellpadding="0" cellspaceing="0">'; foreach($resultaat as $row) {
echo '<tr>';
$code = $row['ProductCode']; 
echo '<td>'.$row['ProductCode'].'</td>';
echo '<td>'.$row['Omschrijving'].'</td>';
echo '<td>'.$row['Inkoopprijs'].'</td>';
echo '<td>'.$row['Verkoopprijs'].'</td>';
echo '<td>'.$row['Voorraad'].'</td>';
echo "<td><form action='levwijzigen.php' method='post'>
<input type='hidden' name='verstopt' value=$code> <input type='submit' name='wijzig' value='wijzig'> </form></td>";
echo "<td><form action='levverwijderen.php' method='post'> <input type='hidden' name='verstopt' value=$code> <input type='submit' name='verwijder' value='verwijder'> </form></td>";
echo '</tr>'; }
echo '</table>';
// Sluiten van verbinding $db = NULL;
?>
        <h5>* Inkoopprijs per stuk</h5>
        <h5>** Verkoopprijs per stuk</h5>
        <h5>*** Totale beschikbare Voorraad</h5>


       <h2><a href="levinloggen.php"> Terug naar homepagina </a></h2>  <br><br><br>
        <footer>
            <p style="width: 200px; float: left">Copyright® 2019</p>
            <p style="float: right; display: inline-block">Jukka John & Sahil Singh</p>
        </footer>

</body>

</html>
