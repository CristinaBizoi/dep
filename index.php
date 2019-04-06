<?php
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