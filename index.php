<?php
// logare
session_start();
if(isset($_POST["act"]) && $_POST["act"]=="login"){
    echo $_POST["email"]." Vrea sa se logheze";
    require_once('./_inc/models/Utilizatori.php');
    $utilizatoriModel = new Utilizatori();
    $utilizatori= $utilizatoriModel->loginUtilizator($email);
    if($utilizator["parola"]===md5($_POST["parola"])){
      $_SESSION = array(
        "logged_in" => true, 
        "email" => $_POST["email"],
        "user_id" => $utlizator["id"]
    );
       echo "User logat";
  }else{
    echo "Parola nu se potriveste";
 }
}

include("./config/db_config.php");
include("./_inc/classes/Db.php");
$db_object = new Db();

if(isset($_GET["page"])){
  $page = $_GET["page"];
}else{
  $page ="";
}


if(is_file("./".$page.".php")){
  include("./".$page.".php");
}else{
  include("./dashboard.php");
}

?>

     