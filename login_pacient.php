<?php
// var_dump($_SESSION);exit();
   if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
       header("Location:./dashboard");
       exit();
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./public/css/login.css" rel="stylesheet">

</head>
<body class="text-center">

    <form class="form-signin" action = "./login_pacient" method="post" role="form">
        <h1 class="h3 mb-3 font-weight-normal">Login Pacient</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input placeholder="CNP" name="cnp" type="text"  class="form-control"  required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input class="form-control" placeholder="PIN" name="pin" type="password" value=""required>
        <input type="hidden" name="act_pacient" value="login">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <small>Login ca medic <a href="./login"><i>Aici</i></a></small>
    </form>
</body>

</html>
