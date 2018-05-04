<?php
    include "dbconn.php";
    $query = "DELETE FROM auti WHERE id = $_GET[id]";
    $result = mysqli_query($MySQL, $query); 
    header("Location: administrator.php");
    mysqli_close($MySQL);
?>