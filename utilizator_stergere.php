<?php
require_once("./_inc/models/Utilizatori.php");
$utilizator_db = new Utilizatori();
$utilizator_sterge = $utilizator_db->deleteUtilizator($_GET["id"]);
header("Location:./utilizatori_listare");
exit();

?>