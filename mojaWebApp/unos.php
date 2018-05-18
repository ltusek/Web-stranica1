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

    <script type="text/javascript">

        function validator() {
            var slanje_forme=false;
            var poljeModel = document.getElementById("model");
            var model = poljeModel.value;
            var poljeMarka = document.getElementById("marka");
            var marka = poljeModel.value;
            var poljeSifra = document.getElementById("sifra");
            var sifra = poljeModel.value;
            var poljeKategorija = document.getElementById("kategorija");
            var kategorija = poljeModel.value;
            var poljeOpis = document.getElementById("opis");
            var opis = poljeModel.value;
            var poljeCijena = document.getElementById("cijena");
            var cijena = poljeModel.value;
            
            if (marka == "-1") {
                poljeMarka.style.borderColor="red";
                document.getElementById("porukaMarka").innerHTML="Marka automobila mora biti odabrana!";
                slanje_forme=false;
            }
            if (model.length < 5 || model.length > 30 ) {
                poljeModel.style.borderColor="red";
                document.getElementById("porukaModel").innerHTML="Model automobila mora imati 5 do 30 znakova!";
                slanje_forme=false;
            }
            if (sifra.length != 10) {
                poljeSifra.style.borderColor="red";
                document.getElementById("porukaSifra").innerHTML="Sifra automobila mora imati 10 znakova!";
                slanje_forme=false;
            }
            if (kategorija == "-1") {
                poljeKategorija.style.borderColor="red";
                document.getElementById("porukaKategorija").innerHTML="Kategorija automobila mora biti odabrana!";
                slanje_forme=false;
            }
            if (opis.length < 10 || model.length > 100 ) {
                poljeOpis.style.borderColor="red";
                document.getElementById("porukaOpis").innerHTML="Opis automobila mora imati 10 do 100 znakova!";
                slanje_forme=false;
            }
            if (cijena == "") {
                poljeKategorija.style.borderColor="red";
                document.getElementById("porukaCijena").innerHTML="Cijena automobila mora biti navedena!";
                slanje_forme=false;
            }
            if (document.getElementById("arh").checked==true){
                var a = confirm ("Jeste li sigurni da zelite arhivirati?");
                if (a==true) {
                    slanje_forme=true;
                }
            }
        
            return false;
        }


        function sranje() {
            var slanje = true;     
            
            if (document.forma.marka.value == "-1") {
                document.forma.marka.style.borderColor="red";
                document.getElementById("porukaMarka").innerHTML="Marka automobila mora biti odabrana!";
                slanje = false;
            }else{
                document.forma.marka.style.borderColor="black";
                document.getElementById("porukaMarka").innerHTML="";
            }

            if(document.forma.model.value.length < 5 || document.forma.model.value.length > 30) {
                document.forma.model.style.borderColor="red";
                document.getElementById("porukaModel").innerHTML="Model automobila mora imati 5 do 30 znakova!";
                slanje=false;
            }else{
                document.forma.model.style.borderColor="black";
                document.getElementById("porukaModel").innerHTML="";
            }

            if (document.forma.sifra.value.length != 10) {
                document.forma.sifra.style.borderColor="red";
                document.getElementById("porukaSifra").innerHTML="Sifra automobila mora imati 10 znakova!";
                slanje=false;
            }else{
                document.forma.sifra.style.borderColor="black";
                document.getElementById("porukaSifra").innerHTML="";
            }

            if (document.forma.kategorija.value == "-1") {
                document.forma.kategorija.style.borderColor="red";
                document.getElementById("porukaKategorija").innerHTML="Marka automobila mora biti odabrana!";
                slanje = false;
            }else{
                document.forma.kategorija.style.borderColor="black";
                document.getElementById("porukaKategorija").innerHTML="";
            }

            if (document.forma.opis.value.length < 10 || document.forma.opis.length > 100 ) {
                document.forma.opis.style.borderColor="red";
                document.getElementById("porukaOpis").innerHTML="Opis automobila mora imati 10 do 100 znakova!";
                slanje=false;
            }else{
                document.forma.opis.style.borderColor="black";
                document.getElementById("porukaOpis").innerHTML="";
            }

            if (document.forma.cijena.value == "") {
                document.forma.cijena.style.borderColor="red";
                document.getElementById("porukaCijena").innerHTML="Cijena automobila mora biti navedena!";
                slanje=false;
            }else{
                document.forma.cijena.style.borderColor="black";
                document.getElementById("porukaCijena").innerHTML="";
            }
            
            

            
        
            return slanje;
        }

        function validateForm(){
            if(sranje()){

                if (document.getElementById("arh").checked==true){
                    var a = confirm ("Jeste li sigurni da zelite arhivirati?");
                    if(a == false)
                        return false;
                    return true;
                }else return true;
            }             
            else return false;
        }

       
    </script>

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
                <a href="administrator.php">Administrator</a>
            </li>
            <li>
                <a href="https://www.tvz.hr/" target="_blank">TVZ</a>
            </li>
        </ul>
    </nav>

    <article class="wrapper">
        <h2>Unesite novi automobil</h2>
        <form enctype="multipart/form-data" action="skripta.php" name="forma" id="formaUnos" method="POST" onsubmit="return validateForm();">
            <div id="form_element">
                <label for="marka">Marka:</label>
                <select id="marka" required name="marka">
                    <option value="-1">Odaberite marku:</option>
                    <?php echo $option1; ?>
                </select>
                <span class="formaValidate" id="porukaMarka"></span>
            </div>
            <div id="form_element">
                <label for="model">Model:</label>
                <input id="model" name="model" type="text" placeholder="Unesi model automobila:">
                <span class="formaValidate" id="porukaModel"></span>
            </div>
            <div id="form_element">
                <label for="sifra">Sifra:</label>
                <input name="sifra" type="text" placeholder="Unesi sifru:">
                <span class="formaValidate" id="porukaSifra"></span>
            </div>

            <div id="form_element">
                <label for="kategorija">Vrsta:</label>
                <select id="kategorija" required name="kategorija">
                    <option value="-1">Odaberite vrstu:</option>

                    <?php echo $option2; ?>

                </select>
                <span class="formaValidate" id="porukaKategorija"></span>
            </div>

            <div id="form_element">
                <label for="opis">Opis: </label>
                <textarea id="opis" name="opis"></textarea>
                <span class="formaValidate" id="porukaOpis"></span>
            </div>

            <div id="form_element">
                <label for="cijena">Cijena:</label>
                <input id="cijena" name="cijena" type="number">
                <span class="formaValidate" id="porukaCijena"></span>
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
                <input name="submit" type="submit" value="submit">
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