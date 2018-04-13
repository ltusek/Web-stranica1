

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Welcome To Auto/Moto CRO</h1>
        <p>Auto/Moto is a used car dealer in Croatia offering high quality vehicles.</p>
    </header>
    <nav>
        <ul class="wrapper">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="onama.html">O nama</a>
            </li>
            <li>
                <a href="#" class="active">Unos</a>
            </li>
            <li>
                <a href="https://www.tvz.hr/" target="_blank">TVZ</a>
            </li>
        </ul>
    </nav>

    <article class="wrapper">

    <?php

$ime = $_POST['name'];
$sifra = $_POST["sifra"];
$kategorija = $_POST["kategorija"];
$opis = $_POST["opis"];
$cijena = $_POST["cijena"];
$arhiviraj = $_POST["arhiviraj"];
$opis = $_POST["opis"];

echo 'Ime koje ste unijeli je ' . $ime . '<br />';
echo "<p>" . $sifra . "<p>";
echo "<p>" . $kategorija . "<p>";
echo "<p>" . $opis . "<p>";
echo "<p>" . $cijena . "<p>";
echo "<p>" . $arhiviraj . "<p>";


?>
        
    </article>

    <footer>
        <img src="img/logo1.png" alt="">
        <p>Tehničko veleučilište u Zagrebu</p>
        <p>Autor: Lovro Tušek</p>
    </footer>
</body>

</html>
