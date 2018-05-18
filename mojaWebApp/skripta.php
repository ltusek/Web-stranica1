

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
                <a href="proizvodi.php">Proizvodi</a>
            </li>
            <li>
                <a href="https://www.tvz.hr/" target="_blank">TVZ</a>
            </li>
        </ul>
    </nav>

    <article class="wrapper">
        <h2>Automobil unesen u bazu</h2>

        <figure>

            <?php
            if(isset($_POST['submit'])){
                define('UPLPATH', 'images/');

            $marka = $_POST['marka'];
            $model = $_POST['model'];
            $sifra = $_POST['sifra'];
            $vrsta = $_POST['kategorija'];
            $opis = $_POST['opis'];
            $cijena = $_POST['cijena'];
            $arhiviraj = $_POST['arhiviraj'];

            if($arhiviraj != 1){
                $arhiviraj = 0;
            }

            # strtolower - Returns string with all alphabetic characters converted to lowercase.
            # strrchr - Find the last occurrence of a character in a string
            $ext = strtolower(strrchr($_FILES['picture']['name'], "."));

            $_picture = $_FILES['picture']['name'];
            copy($_FILES['picture']['tmp_name'], "images/" . $_picture);

            if ($ext == '.jpg' || $ext == '.png' || $ext == '.gif') { # test if format is picture
            echo '<img src="images/' . $_picture . '" />';
            }

            echo '<figcaption><h3>' . $marka . ' ' . $model . '</h3>

                            <div id="kategorija_naslov">
                            <h4>Kategorija: ' . $_POST['kategorija'] . '</h4>
                            <p>' . $_POST['opis'] . '</p></div>
                            <p id="cijena"> Cijena: ' . $_POST['cijena'] . ' kn </p></figcaption>';

            include "dbconn.php";

            $query1 = "SELECT * FROM marke WHERE marke.naziv = '$marka'";
            $result1 = @mysqli_query($MySQL, $query1);
            $idMarka = 0;
            while ($row = @mysqli_fetch_array($result1)) {
                $idMarka = $row['id'];
            }

            $query2 = "SELECT * FROM vrste WHERE vrste.vrstenaziv = '$vrsta'";
            $result2 = @mysqli_query($MySQL, $query2);
            $idVrsta = 0;
            while ($row = @mysqli_fetch_array($result2)) {
                $idVrsta = $row['id'];
            }

            $query3 = "INSERT INTO auti (IDmarke, model, sifra, IDvrste, opis, cijena, slika, arhiviraj) VALUES('$idMarka', '$model', '$sifra', '$idVrsta', '$opis', '$cijena', '$_picture', '$arhiviraj')";
            
            $result = mysqli_query($MySQL, $query3) or die("Error querying database");
            }
            
            ?>
        </figure>

    </article>

    <footer>
        <img src="img/logo1.png" alt="">
        <p>Tehničko veleučilište u Zagrebu</p>
        <p>Autor: Lovro Tušek</p>
    </footer>
</body>

</html>
