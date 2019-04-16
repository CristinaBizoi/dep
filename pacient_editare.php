<?php
    if(isset($_GET["id"]) && $_GET["id"]>0){
        $id = $_GET["id"];
    }else{
        exit();
    }
    require_once('./_inc/models/Pacienti.php');
    $pacientObject = new Pacienti();
    if(isset($_POST) && !empty($_POST)){
        $pacientObject->editPacient($id, $_POST);
        header('Location:./pacienti_listare');
        exit();
    }

    $pacient = $pacientObject->getPacient($id);

    // var_dump($pacient);
  include("./header.php");
?>
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Blank Page</li>
</ol>

<!-- Page Content -->
<h1>Pacient editare</h1>
<hr>
        <form method="POST" action="./pacient_editare?id=<?php echo $pacient["id"]; ?>">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="nume_pacient">Nume</label>
                            <input type="text" name="nume_pacient" class="form-control" id="nume_pacient" aria-describedby="nume_pacient" placeholder="Introduceti nume" value="<?php echo $pacient["nume"]; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="prenume_pacient">Prenume</label>
                        <input type="text" name="prenume_pacient" class="form-control" id="prenume_pacient" placeholder="Introduceti prenume" value="<?php echo $pacient["prenume"]; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="cnp">CNP</label>
                        <input type="text" name="cnp" class="form-control" id="cnp" placeholder="CNP" value="<?php echo $pacient["cnp"]; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="pin">PIN</label>
                        <input type="text" name="pin" class="form-control" id="pin" placeholder="Introduceti PIN" value="<?php echo $pacient["pin"]; ?>">
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" value="<?php echo $pacient["email"]; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" name="telefon" class="form-control" id="telefon" placeholder="Telefon" value="<?php echo $pacient["telefon"]; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="data_nastere">Data nasterii</label>
                        <input type="date" name="data_nastere" class="form-control" id="data_nastere" placeholder="Data nasterii" value="<?php echo $pacient["data_nastere"]; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="sex">Sex</label><br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="sex" id="masculin" value="1" class="custom-control-input" <?php if($pacient["sex"]==1){ echo "checked"; } ?>>
                    <label class="custom-control-label" for="masculin">Masculin</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="sex" id="feminin" value="2"  class="custom-control-input" <?php if($pacient["sex"]==2){ echo "checked"; } ?>>
                    <label class="custom-control-label" for="feminin">Feminin</label>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</div>
<?php 
  include("./footer.php");
 ?>