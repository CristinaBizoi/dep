<?php
//verific daca utilizatorul este logat, daca este user si daca este medic

if(isset($_SESSION["logged_in"]) && $_SESSION["type"]=="user" && $_SESSION["type"] == 2){
    $userID = $_SESSION["user_id"];
    $spital = $_SESSION["id_spital"];
}else{
    header('Location: ./dashboard');
    exit();
}

//id-ul pacientului
if(isset($_GET["id"]) && $_GET["id"]>0){
    $id = $_GET["id"];
}else{
    exit();
}
if(isset($_POST) && !empty($_POST)){
    // incarcam fisierele
    require_once("./_inc/models/FiseMedicale.php");
    require_once("./_inc/models/Tratament.php");
    require_once("./_inc/models/Diagnostic.php");
    //instantiem modele
    $fiseMedicaleModel = new FiseMedicale();
    $tratamentModel = new Tratament();
    $diagnosticModel = new Diagnostic();

    //adauga observatiile la fisa
    $data = [
        "observatii" => $_POST["observatii"],
        "tip_fisa" => $_POST["tip_fisa"],
        "id_pacient" => $id,
        "id_spital" => $spital,
        "id_utilizator" => $userID
    ];//TODO: de adaugat id-ul utilizatorukui si spitalul
    $fisaId = $fiseMedicaleModel->addFisa($data); //il folosim ca sa adaugam diagnostice si tratamente 

    // var_dump($fisaId );
    //var_dump($_POST["cod_tratament"]);
    //varificam daca au fost trimise codul si sunt sunt format de array
    if(is_array($_POST["cod_tratament"]) && count($_POST["cod_tratament"])){
        //parcurg tratamentele
        foreach($_POST["cod_tratament"] as $i=>$cod){

            //stiind ca ele sunt afisat simultan pe pozitia i in vectorul cod_tratament este denumirea din vectorul nume_tratament
            if(isset($_POST["nume_tratament"][$i])){
                $denumire = $_POST["nume_tratament"][$i];
            }else{
                $denumire ="";
            }
            $data = [
                "cod" => $cod,
                "denumire" =>  $denumire,
                "id_fisa" => $fisaId
            ];
            $tratamentModel->addTratament($data);
        }
    }
    //varificam daca au fost trimise codul si sunt sunt format de array, daca nu este array ne va da eroare foreach-ul
    if(is_array($_POST["cod_diagnostic"]) && count($_POST["cod_diagnostic"])){
        //parcurg tratamentele
        foreach($_POST["cod_diagnostic"] as $i=>$cod){

            //stiind ca ele sunt afisat simultan pe pozitia i in vectorul cod_diagnostic este denumirea din vectorul nume_diagnostic
            if(isset($_POST["nume_diagnostic"][$i])){
                $denumire = $_POST["nume_diagnostic"][$i];
            }else{
                $denumire ="";
            }
            $data = [
                "cod" => $cod,
                "denumire" =>  $denumire,
                "id_fisa" => $fisaId
            ];
            $diagnosticModel->addDiagnostic($data);
        }
    }
    header('Location:./pacienti_listare?mesaj='.urlencode('Fisa a fost adaugata'));
    exit();
}

//scoatem informatiile despre pacient
require_once("./_inc/models/Pacienti.php");
$pacientObject = new Pacienti();
$pacient = $pacientObject->getPacient($id);

//verificam daca am gasit date despre pacient (daca exista)
if(empty($pacient)){
    header('Location:./pacienti_listare?mesaj='.urlencode('Utilizatorul nu exista'));
    exit();
}
include("./header.php");
?>

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="./pacienti_listare">Pacienti</a></li>
        <li class="breadcrumb-item active">Adaugare fisa</li>
    </ol>

    <!-- Page Content -->
    <h1>Fisa adaugare</h1>
    <hr>
    <h2>Pacient</h2>
    <hr>
    <div class="row">
        <div class="col-6">
            <p><b>Nume:</b> <?php echo $pacient["nume"]; ?></p>
            <p><b>Prenume:</b> <?php echo $pacient["prenume"]; ?></p>
            <p><b>CNP:</b> <?php echo $pacient["cnp"]; ?></p>
            <p><b>Sex:</b> <?php echo $pacient["sex"]; ?></p>
        </div>
        <div class="col-6">
            <p><b>Data nasterii:</b> <?php echo date("d.m.Y",strtotime($pacient["data_nastere"])); ?></p>
            <p><b>Telefon:</b> <?php echo $pacient["telefon"]; ?></p>
            <p><b>E-mail:</b> <?php echo $pacient["email"]; ?></p>
        </div>
    </div>
    <h2>Informatii</h2>
    <hr>
    <div class="row pb-sm-5">
        <div class="col-12">
            <form action="./fisa_adaugare?id=<?php echo $id; ?>" method="post">  
                <div class="form-group">
                    <label >Tip fisa:</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="tip_fisa" id="internare" value="1" class="custom-control-input">
                        <label class="custom-control-label" for="internare">Internare</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="tip_fisa" id="externare" value="2"  class="custom-control-input">
                        <label class="custom-control-label" for="externare">Exterenare</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="tip_fisa" id="consult" value="3"  class="custom-control-input">
                        <label class="custom-control-label" for="consult">Consult</label>
                    </div>
                </div>          
                <div class="form-group">
                    <label for="observatii">Observatii</label>
                    <textarea name="observatii" class="form-control" id="telefobservatiion" placeholder="Observatii" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label >Diagnostice</label>
                    <div class="input-group mb-2">
                        <input type="text" name="cod_diagnostic[]" class="form-control col-3 mr-3"  placeholder="Cod diagnostic" value="">
                        <input type="text" name="nume_diagnostic[]" class="form-control col-9" placeholder="Nume diagnostic" value="">
                        <div class="input-group-append">
                            <button class="btn btn-success  add-diagnostic" type="button"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                  
                </div>
                <div class="form-group">
                    <label >Tratamente</label>
                    <div class="input-group mb-2">
                        <input type="text" name="cod_tratament[]" class="form-control col-3 mr-3"  placeholder="Cod tratament" value="">
                        <input type="text" name="nume_tratament[]" class="form-control col-9"  placeholder="Nume tratament" value="">
                        <div class="input-group-append">
                            <button class="btn btn-success add-tratament" type="button">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Trimite</button>
            </form>
        </div>
        
    </div>
</div>
    <!-- /.container-fluid -->
<script>
        //la eventimentul de click pe butonul cu clasa add-tratament
        $(document).on('click', '.add-tratament', function(){
            console.log(this); //this este butonul pe care am dat click

            var parinte = $(this).closest('.form-group'); //parintele cu clasa .form-group

            //la elementul parinte mai adaugam un grup de inputuri
            $(parinte).append('<div class="input-group mb-2">'+
                        '<input type="text" name="cod_tratament[]" class="form-control col-3 mr-3"  placeholder="Cod tratament" value="">'+
                        '<input type="text" name="nume_tratament[]" class="form-control col-9"  placeholder="Nume tratament" value="">'+
                        '<div class="input-group-append">'+
                            '<button class="btn btn-success add-tratament" type="button">'+
                                '<i class="fas fa-plus"></i>'+
                            '</button>'+
                        '</div>'+
                    '</div>');
        });
        $(document).on('click', '.add-diagnostic', function(){
            console.log(this); //this este butonul pe care am dat click

            var parinte = $(this).closest('.form-group'); //parintele cu clasa .form-group
             //la elementul parinte mai adaugam un grup de inputuri
            $(parinte).append('<div class="input-group mb-2">'+
                        '<input type="text" name="cod_diagnostic[]" class="form-control col-3 mr-3"  placeholder="Cod diagnostic" value="">'+
                        '<input type="text" name="nume_diagnostic[]" class="form-control col-9"  placeholder="Nume diagnostic" value="">'+
                        '<div class="input-group-append">'+
                            '<button class="btn btn-success add-diagnostic" type="button">'+
                                '<i class="fas fa-plus"></i>'+
                            '</button>'+
                        '</div>'+
                    '</div>');
        });

</script>
 <?php 
  include("./footer.php");
 ?>