

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
                <a href="unos.php">Unos</a>
            </li>
            <li>
                <a href="#" class="active">Proizvodi</a>
            </li>
            <li>
                <a href="https://www.tvz.hr/" target="_blank">TVZ</a>
            </li>
        </ul>
    </nav>

    <article class="wrapper">
        <h2>Automobili na prodaju</h2>
       

        <?php 
        
        define('UPLPATH', 'images/');
        
        include "dbconn.php";
        $query  = "SELECT * FROM auti INNER JOIN marke ON marke.id = auti.IDmarke INNER JOIN vrste ON vrste.id = auti.IDvrste";
        $result = @mysqli_query($MySQL, $query) or die('Error querying databese.');
        while($row = @mysqli_fetch_array($result)){
            if($row['arhiviraj'] == 1){
                echo '<figure><img src="images/' . $row['slika'] . '" />';

                echo '<figcaption><h3>' . $row['naziv'] . ' ' . $row['model'] . '</h3>
                <div id="kategorija_naslov">
                <h4>Kategorija: ' . $row['vrstenaziv'] . '</h4>
                <p>' . $row['opis'] . '</p></div>
                <p id="cijena"> Cijena: ' . $row['cijena'] . ' kn </p></figcaption></figure>';
            }        
        }
    
        ?>
   
       
    </article>

    <footer>
        <img src="img/logo1.png" alt="">
        <p>Tehničko veleučilište u Zagrebu</p>
        <p>Autor: Lovro Tušek</p>
    </footer>
</body>

</html>
