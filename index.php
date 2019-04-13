<?php
// logare
session_start();

include("./config/db_config.php");
include("./_inc/classes/Db.php");
if(isset($_POST["act"]) && $_POST["act"]=="login"){
    // echo $_POST["email"]." Vrea sa se logheze";
    require_once('./_inc/models/Utilizatori.php');
    $utilizatoriModel = new Utilizatori();
    $utilizator= $utilizatoriModel->loginUtilizator($_POST["email"]);
    var_dump($utilizator);
    // exit();
    if($utilizator["parola"]===md5($_POST["parola"])){
      $_SESSION = array(
        "logged_in" => true, 
        'type' => 'user',
        "email" => $_POST["email"],
        "rol" => $utlizator["rol"],
        "nume" => $utlizator["nume"],
        "prenume" => $utlizator["prenume"],
        "user_id" => $utlizator["id"]
    );
       echo "User logat";
  }else{
    echo "Parola nu se potriveste";
 }
}


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

     