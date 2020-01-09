<?php
use Aranyasen\HL7\Message;
use Aranyasen\HL7\Segment;
use Aranyasen\HL7\Segments\MSH;
use Aranyasen\HL7\Segments\PID;
use Aranyasen\HL7\Segments\DG1;
use Aranyasen\HL7\Segments\PV1;
use Aranyasen\HL7\Segments\OBX;

$msg = new Message($file);
$pid = $msg->getSegmentByIndex(1);
$pacient_cnp = $pid->getField(2);
  // incarcam fisierele
  require_once("./_inc/models/FiseMedicale.php");
  require_once("./_inc/models/Tratament.php");
  require_once("./_inc/models/Diagnostic.php");
  require_once("./_inc/models/Pacienti.php");
  require_once("./_inc/models/Spitale.php");
  //instantiem modele
  $fiseMedicaleModel = new FiseMedicale();
  $tratamentModel = new Tratament();
  $diagnosticModel = new Diagnostic();
  $pacientiModel = new Pacienti();
  $spitaleModel = new Spitale();
  $pacient_id = $pacientiModel->getPacientbyCNP($pacient_cnp);
  $observatii = $msg->getSegmentsByName('OBX')[0]->getField(2);
  $spital_nume = $msg->getSegmentsByName('PV1')[0]->getField(3);
  $spital_id = $spitaleModel->getSpitalByName($spital_nume);

  $data = [
    "observatii" => $observatii,
    "id_pacient" => \strval($pacient_id) ,
    "id_spital" => \strval($spital_id),
    "id_utilizator" =>  $_SESSION["user_id"],
    "tip_fisa" =>"1"
];
    $fisaId = $fiseMedicaleModel->addFisa($data);

    $tratamente = $msg->getSegmentsByName('RXG');
    foreach($tratamente as $tratament){
        $tratament_cod = $tratament->getField(4);
        $denumire ="";
        $data_tratament = [
            "cod" => $tratament_cod,
            "denumire" =>  $denumire,
            "id_fisa" => $fisaId
        ];
        $tratamentModel->addTratament($data_tratament);
    }
   
    $diagnostice = $msg->getSegmentsByName('DG1');
    foreach($diagnostice as $diagnostic){
        $cod_diagnostic = $diagnostic->getField(3);
        $nume_diagnostic = $diagnostic->getField(4);
        $data_diagnostic = [
            "cod" => $cod_diagnostic,
            "denumire" =>  $nume_diagnostic,
            "id_fisa" => $fisaId
        ];
        $diagnosticModel->addDiagnostic($data_diagnostic);
    }