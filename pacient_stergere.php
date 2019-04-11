<?php
require_once("./_inc/models/Pacienti.php");
$pacient_db = new Pacienti();
$pacient_sterge = $pacient_db->deletePacient($_GET["id"]);
header("Location:./pacienti_listare");
exit();

?>