<?php
session_start();

include "dbconn.php";

// variable declaration
$username = "";
$email    = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($MySQL, $_POST['username']);
  $name = mysqli_real_escape_string($MySQL, $_POST['name']);
  $password_1 = mysqli_real_escape_string($MySQL, $_POST['password']);
  $password_2 = mysqli_real_escape_string($MySQL, $_POST['repassword']);

  // form validation: ensure that the form is correctly filled
  /*
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  */

  // register user if there are no errors in the form

    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO users (username, password, name, level) 
                VALUES('$username', '$password', '$name', '0')";
    mysqli_query($MySQL, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
    //echo'You are now logged in';

}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($MySQL, $_POST['username']);
  $password = mysqli_real_escape_string($MySQL, $_POST['password']);

  /*
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  */

  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($MySQL, $query);
  	if (mysqli_num_rows($results) == 1) {
        $rowLevel = @mysqli_fetch_array($result);
  	  $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        if($row['level'] == 1){
            $_SESSION['level'] = "admin";
            header('location: administrator.php');
        }else{
            $_SESSION['level'] = "korisnik";
            header('location: index.php');
        }
  	}
  }


?>