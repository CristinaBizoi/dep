<?php
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
    <h1>Fisa (<?php echo $id; ?>)</h1>
    <hr>
    <h2>Medic</h2>
    <hr>
    <div class="row">
        <div class="col-6">
            <p><b>Nume:</b> <?php echo $fisa["nume_utilizator"]; ?></p>
            <p><b>Prenume:</b> <?php echo $fisa["prenume_utilizator"]; ?></p>
        </div>
        <div class="col-6">
            <p><b>Data:</b> <?php echo date("d.m.Y",strtotime($fisa["data_adaugare"])); ?></p>
            <p><b>Spital:</b> <?php echo $fisa["nume_spital"]; ?></p>
        </div>
    </div>

    <h2>Pacient</h2>
    <hr>
    <div class="row">
        <div class="col-6">
            <p><b>Nume:</b> <?php echo $fisa["nume_pacient"]; ?></p>
            <p><b>Prenume:</b> <?php echo $fisa["prenume_pacient"]; ?></p>
            <p><b>CNP:</b> <?php echo $fisa["cnp"]; ?></p>
            <p><b>Sex:</b> <?php echo $sexe[$fisa["sex"]]; ?></p>
            <p><b>Data nasterii:</b> <?php echo date("d.m.Y",strtotime($fisa["data_nastere"])); ?></p>
            <p><b>Telefon:</b> <?php echo $fisa["telefon"]; ?></p>
        </div>
        <div class="col-6">                   
            <p><b>E-mail:</b> <?php echo $fisa["email"]; ?></p>
            <p><b>Rh:</b> <?php echo ($fisa["rh"])?"Da":"Nu"; ?></p>
            <p><b>Grupa sangvina:</b> <?php echo $fisa["grupa_sange"]; ?></p>
            <p><b>Donator?:</b> <?php echo ($fisa["donator"])?"Da":"Nu"; ?></p>
            <p><b>Avertizari:</b> <?php echo $fisa["avertizari"]; ?></p>
        </div>
    </div>
    <h2>Informatii</h2>
    <hr>
    <div class="row pb-sm-5">
        <div class="col-12">
                <div class="form-group">
                    <label >Tip fisa:</label><br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="tip_fisa" id="internare" value="1" 
                            <?php if($fisa["tip_fisa"]==1){ echo "checked"; } ?>
                             disabled="disabled" class="custom-control-input">
                        <label class="custom-control-label" for="internare">Internare</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="tip_fisa" id="externare" value="2"
                        <?php if($fisa["tip_fisa"]==2){ echo "checked"; } ?>
                          disabled="disabled" class="custom-control-input">
                        <label class="custom-control-label" for="externare">Exterenare</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="tip_fisa" id="consult" value="3"
                        <?php if($fisa["tip_fisa"]==3){ echo "checked"; } ?>
                        disabled="disabled" class="custom-control-input">
                        <label class="custom-control-label" for="consult">Consult</label>
                    </div>
                </div>          
                <div class="form-group">
                    <label for="observatii">Observatii</label>
                    <textarea name="observatii" class="form-control" id="telefobservatiion" placeholder="Observatii" rows="10" disabled="disabled" ><?php echo $fisa["observatii"]; ?></textarea>
                </div>
                <div class="form-group">
                    <label >Diagnostice</label>
                    <?php if(count($diagnostice)){ 
                        foreach($diagnostice as $diagnostic){
                        ?> 
                            <div class="input-group mb-2">
                                <input type="text" name="cod_diagnostic[]" class="form-control col-3 mr-3" disabled="disabled"  placeholder="Cod diagnostic" value="<?php echo $diagnostic["cod"]; ?>">
                                <input type="text" name="nume_diagnostic[]" class="form-control col-9" disabled="disabled"  placeholder="Nume diagnostic" value="<?php echo $diagnostic["denumire"]; ?>">
                        
                            </div>
                    <?php }  
                }else{ ?>
                    <p>Nu au fost adaugate diagnostice</p>
                 <?php } ?>
                </div>
                <div class="form-group">
                    <label >Tratamente</label>
                    <?php if(count($diagnostice)){ 
                        foreach($tratamente as $tratament){
                        ?> 
                            <div class="input-group mb-2">
                                <input type="text" name="cod_tratament[]" class="form-control col-3 mr-3" disabled="disabled"  placeholder="Cod tratament" value="<?php echo $tratament["cod"]; ?>">
                                <input type="text" name="nume_tratament[]" class="form-control col-9" disabled="disabled"  placeholder="Nume tratament" value="<?php echo $tratament["denumire"]; ?>">
                            </div>
                    <?php }
                 }else{ ?>
                    <p>Nu au fost adaugate tratamente</p>
                 <?php } ?>
                </div>

        </div>
        
    </div>
</div>
    <!-- /.container-fluid -->

 <?php 
  include("./footer.php");
 ?>