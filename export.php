<?php
use Aranyasen\HL7\Message;
use Aranyasen\HL7\Segment;
use Aranyasen\HL7\Segments\MSH;
use Aranyasen\HL7\Segments\PID;

//id-ul fisei
if(isset($_GET["id"]) && $_GET["id"]>0){
    $id = $_GET["id"];
}else{
    header('Location:./pacienti_listare?mesaj='.urlencode('Fisa nu exista'));
    exit();
}

// incarcam fisierele
require_once("./_inc/models/FiseMedicale.php");
require_once("./_inc/models/Tratament.php");
require_once("./_inc/models/Diagnostic.php");
//instantiem modele
$fiseMedicaleModel = new FiseMedicale();
$tratamentModel = new Tratament();
$diagnosticModel = new Diagnostic();
$fisa = $fiseMedicaleModel->getFisa($id);

//in cazul in care este logat ca pacient verificam sa fie ale lui
if($_SESSION["logged_in"] && $_SESSION["type"]=='pacient'){
    if($_SESSION["user_id"]!=$fisa["id_pacient"]){
        header('Location:./dashboard');
        exit();
    }
}
//verificam daca am gasit date despre pacient (daca exista)
if(empty($fisa)){
    header('Location:./pacienti_listare?mesaj='.urlencode('Fisa nu exista'));
    exit();
}

//scoatem tratamentele si diagnosticele pentru fisa
$diagnostice = $diagnosticModel->getDiagnosticeByFisa($id);
$tratamente = $tratamentModel->getTratamenteByFisa($id);

$sexe = array(
    '1'=>"M",
    '2'=>"F"
);


// GENERARE MESAJ HL7

$msg = new Message(); // Either \n or \r can be used as segment endings

$msh = new MSH();
$msg->addSegment($msh); // Message is: "MSH|^~\&|||||20171116140058|||2017111614005840157||2.3|\n"


// Create a defined segment (To know which segments are defined in this package, look into Segments/ directory)
// Advantages of defined segments over custom ones (shown above) are 1) Helpful setter methods, 2) Auto-incrementing segment index
$pid = new PID(); // Automatically creates PID segment, and adds segment index at PID.1
$pid->setPatientID($fisa["cnp"]);
$pid->setPatientName([$fisa["nume_pacient"], $fisa["prenume_pacient"]]); // Use a setter method to add patient's name at standard position (PID.5)
$pid->setSex($sexe[$fisa["sex"]]);
$msg->addSegment($pid);

// Adaugam alt segment

// Create any custom segment
$abc = new Segment('OBX');
$abc->setField(1, 'xyz');
$abc->setField(2, 22);
$abc->setField(4, ['']); // Set an empty field at 4th position. 2nd and 3rd positions will be automatically set to empty
$msg->setSegment($abc, 2); // Message is now: "MSH|^~\&|||||20171116140058|||2017111614005840157||2.3|\nABC|xyz|\n"


echo nl2br($msg->toString(true));

?>