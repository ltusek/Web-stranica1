<?php
    include "dbconn.php";
 
    $query = "UPDATE auti SET vidljiv = !$_GET[visible] WHERE id = $_GET[id]";
    $result = mysqli_query($MySQL, $query); 
 
    header("Location: administrator.php");
    mysqli_close($MySQL);
?>