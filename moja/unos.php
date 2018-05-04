<!DOCTYPE html>
<?php
include "dbconn.php";
$query2 = "SELECT * FROM vrste ORDER BY vrste.vrstenaziv ASC";
$result2 = @mysqli_query($MySQL, $query2);
$option2 = '';
while ($row = @mysqli_fetch_array($result2)) {
    $option2 .= '<option value = "' . $row['vrstenaziv'] . '">' . $row['vrstenaziv'] . '</option>';
}

$query1 = "SELECT * FROM marke ORDER BY marke.naziv ASC";
$result1 = @mysqli_query($MySQL, $query1);
$option1 = '';
while ($row = @mysqli_fetch_array($result1)) {
    $option1 .= '<option value = "' . $row['naziv'] . '">' . $row['naziv'] . '</option>';
}


/*
<div id="form_element">
    <label for="name">Naziv:</label>
    <input name="name" type="text" placeholder="Unesi naziv:">
</div>
*/
?>

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
                <a href="proizvodi.php">Proizvodi</a>
            </li>
            <li>
                <a href="https://www.tvz.hr/" target="_blank">TVZ</a>
            </li>
        </ul>
    </nav>

    <article class="wrapper">
        <h2>Unesite novi automobil</h2>
        <form enctype="multipart/form-data" action="skripta.php" name="forma" method="POST">
            <div id="form_element">
                <label for="marka">Marka:</label>
                <select required name="marka">
                    <option value="">Odaberite marku:</option>
                    <?php echo $option1; ?>
                </select>
            </div>
            <div id="form_element">
                <label for="model">Model:</label>
                <input name="model" type="text" placeholder="Unesi model automobila:">
            </div>
            <div id="form_element">
                <label for="sifra">Sifra:</label>
                <input name="sifra" type="text" placeholder="Unesi sifru:">
            </div>

            <div id="form_element">
                <label for="kategorija">Vrsta:</label>
                <select required name="kategorija">
                    <option value="">Odaberite vrstu:</option>

                    <?php echo $option2; ?>

                </select>
            </div>

            <div id="form_element">
                <label for="opis">Opis: </label>
                <textarea name="opis"></textarea>
            </div>

            <div id="form_element">
                <label for="cijena">Cijena:</label>
                <input name="cijena" type="number">
            </div>

            <div id="form_element">
                <label for="picture">Slika:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input type="file" name="picture" id="picture">
            </div>


            <div id="form_element">
                <label>Arhiviraj:</label>
                <input type="checkbox" name="arhiviraj" value="1" id="arh" />

            </div>

            <div id="form_element">
                <input name="submit" type="submit" value="Posalji!">
                <input name="reset" type="reset" value="Resetiraj!">

            </div>


        </form>

    </article>

    <footer>
        <img src="img/logo1.png" alt="">
        <p>Tehničko veleučilište u Zagrebu</p>
        <p>Autor: Lovro Tušek</p>
    </footer>
</body>

</html>