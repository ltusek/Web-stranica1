

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
        <h2>Automobili na prodaju</h2>
        <figure>
            <img src="img/car1.jpg" alt="">
            <figcaption>
                <h3>2010 Ford Escape XLT</h3>
                <div id="kategorija_naslov">
                    <h4>Kategorija: SUV</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <p id="cijena">Cijena: 80,000 kn</p>
            </figcaption>
        </figure>
        <figure>
            <img src="img/car2.jpg" alt="">
            <figcaption>
                <h3>2006 Dodge Ram 1500 4dr Quad</h3>
                <div id="kategorija_naslov">
                    <h4>Kategorija: Pick-up</h4>
                    
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </p>
                </div>
                <p id="cijena">Cijena: 105,000 kn</p>
            </figcaption>
        </figure>
        <figure>
            <img src="img/car3.jpg" alt="">
            <figcaption>
            <?php
                if (isset($_POST['arhiviraj']))
                {
                    echo '<h3>' . $_POST['name'] . '</h3>
                    
                    <div id="kategorija_naslov">
                    <h4>Kategorija: ' . $_POST['kategorija'] . '</h4>
                    <p>' . $_POST['opis'] . '</p></div>
                    <p id="cijena"> Cijena: ' . $_POST['cijena'] . ' kn </p>';

                }
                else
                {
                    echo '<p>Novi post se ne prikazuje!</p>';
                }
            ?>
                
            </figcaption>
        </figure>
       
    </article>

    <footer>
        <img src="img/logo1.png" alt="">
        <p>Tehničko veleučilište u Zagrebu</p>
        <p>Autor: Lovro Tušek</p>
    </footer>
</body>

</html>
