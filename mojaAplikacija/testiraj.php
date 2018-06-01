<?php
    include "timerLogout.php";
    include "connect.php";
?>
 
<!DOCTYPE html>
<html lang="hr">
 
    <head>    
        <meta charset="UTF-8">
        <meta name="description" content="Vježbe iz predmeta Programiranje web aplikacija">
        <meta name="keywords" content="programiranje, web, aplikacije, servisi">
        <!--<meta http-equiv="refresh" content="1">-->
        <link rel="shortcut icon" href="dolan.png">
        <link type="text/css" rel="stylesheet" href="style.css" />
         
        <title>Administrator - TVZ News</title>
    </head>
 
    <body>
 
        <div id="wrapper">
     
            <header>
             
                <div id="header2">
                     
                    <figure><a href="index.php"><img src="images/main_logo.png" alt="logo"/></a></figure>
                 
                    <h1><a href="index.php">TVZ News</a></h1>
                     
                    <nav>
                    <ul>
                    <li><a href="index.php">Naslovna</a></li>
                    <li><a href="onama.html">O nama</a></li>
                    <li><a href="unos.html">Unos</a></li>
                    <li><a href="administrator.php">Admin</a></li>
                    <li><a href="http://www.tvz.hr" target="_blank">TVZ web</a></li>
                    </ul>
                    </nav>
                </div>
             
            </header>
             
            <div id="content_wrap">
                 
                <div id="content">
                 
                    <section>
                     
                        <?php
                            
                            

                        echo '<div id="logoutbig"><div id="loggedIn">Prijavljeni ste kao <span style="color:red; font-style:italic" >' . $_SESSION['User']['Name'] .'</span></div>';
                        echo '<form action="logout.php" method="post"><input type="submit" id="logoutbutton" value="Odjava"></form></div>';
                        $query = "SELECT * FROM vijesti";
                        $result = mysqli_query($con, $query) or die('Error querying databese.');
                            
                        while($row = mysqli_fetch_array($result))
                        {
                            echo '<article><h2><a href="index.php?id=' . $row['id'] . '">' . $row['naslov'] . '</a></h2>
                                <h3>' . $row['kratkiSadrzaj'] . '</h3>
                                <div id="kategorija">
                                <div id="kategorija_naslov">Kategorija: </div>
                                <h4>' . $row['kategorija'] . '</h4></div>
                                <div id="text"><p>' . $row['sadrzaj'] . '</p></div>';

                            if($row['vidljiv'])
                            {
                                echo '<div id="vidljivost">Vijest nije skrivena</div>';
                                echo '<div id="hide"><a href="toggleVisibility.php?id=' . $row['id'] . '&amp;visible=' . $row['vidljiv'] . '">Sakrij vijest s početne</a></div>';
                            }
                            else
                            {
                                echo '<div id="vidljivost">Vijest je skrivena</div>';
                                echo '<div id="hide"><a href="toggleVisibility.php?id=' . $row['id'] . '&amp;visible=' . $row['vidljiv'] . '">Prikaži vijest na početnoj</a></div>';
                                        
                            }
                            echo '<div id="delete"><a href="delete.php?id=' . $row['id'] . '">Obriši vijest</a></div></article>';                             
                        }

                            
                        ?>
                     
                    </section>
                 
                </div>
             
            </div>
             
            <footer>
                <p>
                Copyright © 2014 | All rights reserved. &nbsp;&nbsp;|
                <a href="#">Idi na vrh</a> |
                <a href="index.php">Naslovna</a> |
                <a href="onama.html">O nama</a> |
                <a href="unos.html">Unos</a> |
                <a href="http://www.tvz.hr" target="_blank">TVZ web</a> |
                </p>
                 
                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px"
                    src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                    alt="Valid CSS!" />
                </a>
                 
            </footer>
     
        </div>
     
    </body>
 
</html>


<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "testing");
$country = '';
$query = "SELECT country FROM country_state_city GROUP BY country ORDER BY country ASC";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($result)) {
    $country .= '<option value="' . $row["country"] . '">' . $row["country"] . '</option>';
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Dynamic Dependent Select Box using JQuery Ajax with PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:600px;">
   <h2 align="center">Dynamic Dependent Select Box using JQuery Ajax with PHP</h2><br /><br />

   <select name="country" id="country" class="form-control action">
    <option value="">Select Country</option>
    <?php echo $country; ?>
   </select>

   <br />

   <select name="state" id="state" class="form-control action">
    <option value="">Select State</option>
   </select>

   <br />

   <select name="city" id="city" class="form-control">
    <option value="">Select City</option>
   </select>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "country")
   {
    result = 'state';
   }
   else
   {
    result = 'city';
   }
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>






