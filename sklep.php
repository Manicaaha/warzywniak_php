<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link href="styl2.css" rel="stylesheet">
</head>
<body>
    <div class="baner1"><h1>Internetowy sklep z eko-warzywami</h1></div>    
    <div class="baner2">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </div>
    <div class="glowny">
        <?php
        $lacz = mysqli_connect('localhost','root','','dane2');

        $pyt = "SELECT `nazwa`,`ilosc`,`opis`,`cena`,`zdjecie` FROM `produkty` WHERE `Rodzaje_id` LIKE 1 OR `Rodzaje_id` LIKE 2 ;";
        $wyn = mysqli_query($lacz, $pyt);
        while($row = mysqli_fetch_array($wyn)){
            echo '<div class="blok">';
            echo '<img src="'.$row[4].'" alt="warzywniak">';
            echo '<h5>'.$row[0].'</h5>';
            echo '<p>opis: '.$row[2].'</p><p>na stanie: '.$row[1].'</p>';
            echo '<h2>'.$row[3].' zł</h2>';
            echo '</div>';
        }
        mysqli_close($lacz);
        ?>
    </div>
    <div class="stopka">
        <form action="sklep.php" method="post">
            Nazwa: <input type="text" name="nazwa">
            Cena: <input type="number" name="cena">
            <input type="submit" value="Dodaj produkt">
        </form>
        Stronę wykonał: Martyna Borowska
    </div>
</body>
</html>
<?php
$lacz = mysqli_connect('localhost','root','','dane2');
if(!empty($_POST["nazwa"])&& !empty($_POST["cena"])){
    $nazwa = $_POST["nazwa"];
    $cena = $_POST["cena"];
    $pyt = "INSERT INTO `produkty`( `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `cena`, `zdjecie`) VALUES (1,4,'$nazwa',10,'$cena','owoce.jpg');";
    $wyn = mysqli_query($lacz, $pyt);
    mysqli_close($lacz);
}
?>