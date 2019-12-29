<?php
// logare
session_start();
include("./config/db_config.php");
include("./_inc/classes/Db.php");
$message = null;
$error = null;
if(isset($_POST["act"]) && $_POST["act"]=="login"){
    // echo $_POST["email"]." Vrea sa se logheze";
    require_once('./_inc/models/Utilizatori.php');
    $utilizatoriModel = new Utilizatori();
    $utilizator= $utilizatoriModel->loginUtilizator($_POST["email"]);


    if($utilizator && $utilizator["parola"]===md5($_POST["parola"])){
      $_SESSION = array(
        "logged_in" => true, 
        'type' => 'user',
        "email" => $_POST["email"],
        "rol" => $utilizator["rol"],
        "nume" => $utilizator["nume"],
        "prenume" => $utilizator["prenume"],
        "user_id" => $utilizator["id"],
        "id_spital" => $utilizator["id_spital"]
    );
    // var_dump($utilizator);
    // exit();
       $message =  "User logat";
  }else{
    $error =  "Datele de atentificare nu se potrivessc";
 }
}
if(isset($_POST["act_pacient"]) && $_POST["act_pacient"]=="login"){
    require_once('./_inc/models/Pacienti.php');
    $pacientiModel = new Pacienti();
    $pacient = $pacientiModel ->loginPacient($_POST["cnp"]);
    if($pacient && $pacient["pin"]===md5($_POST["pin"])){
      $_SESSION = array(
        "logged_in" => true, 
        'type' => 'pacient',
        "cnp" => $_POST["cnp"],
        "nume" => $pacient["nume"],
        "prenume" => $pacient["prenume"],
        "user_id" => $pacient["id"]
    );
        $message =  "User logat";
  }else{
        $error = "Parola nu se potriveste";
 }
}

//vedem ce pagina trebuie sa incarcam
if(isset($_GET["page"])){
  $page = $_GET["page"];
}else{
  $page ="";
}

//verificam daca este logat
if(!isset($_SESSION["logged_in"])){
  if($page!='login_pacient' && $page!='login'){
    header("Location:./login_pacient");
    exit();    
  }
}
require __DIR__ . '/vendor/autoload.php';





$db_object = new Db();
if(is_file("./".$page.".php")){
  include("./".$page.".php");
}else{
  include("./dashboard.php");
}

?>

     