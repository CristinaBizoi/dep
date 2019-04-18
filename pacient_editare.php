<?php
    if(isset($_GET["id"]) && $_GET["id"]>0){
        $id = $_GET["id"];
    }else{
        exit();
    }
    require_once('./_inc/models/Pacienti.php');
    $pacientObject = new Pacienti();
    if(isset($_POST) && !empty($_POST)&&$_POST["act"]=="changedetails"){
        if(!isset($_POST['acord_fisa'])){
            $_POST['acord_fisa']=0;
        }
        if(!isset($_POST['donator'])){
            $_POST['donator']=0;
        }
        $pacientObject->editPacient($id, $_POST);
        header('Location:./pacienti_listare');
        exit();
    }
    $pacient = $pacientObject->getPacient($id);
    if(isset($_POST)&&!empty($_POST)&&$_POST["act"]=="changepin"){
        $error = false;
        if ($_POST["pin"] != $_POST["pin_re"]){
            $error = true;
        }
        if ($error == false){
            $pacientObject->editPacientPin($id, $_POST["pin"]);
            header('Location:./pacienti_listare');
            exit();
        }
    }


    // var_dump($pacient);
  include("./header.php");
?>
<div class="container-fluid  pb-5">

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
        <form method="POST" action="./pacient_editare?id=<?php echo $pacient["id"]; ?>" id="myForm">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="nume_pacient">Nume</label>
                            <input type="text" name="nume_pacient" class="form-control verificare" id="input_1" aria-describedby="nume_pacient" placeholder="Introduceti nume" value="<?php echo $pacient["nume"]; ?>">
                            <div class="alert alert-danger" role="alert" style="display:none" id="eroare_input_1">
                                Nu ati introdus numele
                            </div> 
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="prenume_pacient">Prenume</label>
                        <input type="text" name="prenume_pacient" class="form-control verificare" id="input_2" placeholder="Introduceti prenume" value="<?php echo $pacient["prenume"]; ?>">
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_input_2">
                            Nu ati introdus prenumele
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="cnp">CNP</label>
                        <input type="text" name="cnp" class="form-control verificare" id="input_3" placeholder="CNP" value="<?php echo $pacient["cnp"]; ?>">
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_input_3">
                            Introduceti un CNP valid
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="grupa_sange">Grupa sanguina</label>
                        <input type="text" name="grupa_sange" class="form-control form-field" id="grupa_sange" value="<?php echo $pacient["grupa_sange"]; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="rh">Adaugare Rh</label>
                        <select class="form-control" id="rh" name="rh" >
                            <option value="1" <?php if($pacient["rh"]==1){ echo "selected";}?>>+</option>
                            <option value="2" <?php if($pacient["rh"]==2){ echo "selected";}?>>-</option>
                        </select>
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
            <div class="form-group row">
                <div class="col-sm-3">Sunt de acord cu donarea de organe</div>
                <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="donator" name="donator" value="1" <?php if($pacient["donator"]==1){ echo "checked";}?>>
                    <label class="form-check-label" for="donator">
                    Da, sunt de acord.
                    </label>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">Sunt de acord cu fisa medicala</div>
                <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="acord_fisa" id="acord_fisa" value="1" <?php if($pacient["acord_fisa"]==1){ echo "checked";}?>>
                    <label class="form-check-label" for="acord_fisa">
                    Da, sunt de acord.
                    </label>
                </div>
                </div>
            </div>
            <input type="hidden" name="act" value="changedetails">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <h3 class="my-4">Editrare PIN</h3>
        <form method="POST" action="./pacient_editare?id=<?php echo $pacient["id"]; ?>">
        <div class="row">
            <div class="col-6">
                    <div class="form-group">
                        <label for="pin">PIN nou</label>
                        <input type="number" name="pin" class="form-control" id="pin" placeholder="Introduceti PIN" >
                    </div>
            </div>
            <div class="col-6">
                    <div class="form-group">
                        <label for="pin">Reintroducere PIN</label>
                        <input type="number" name="pin_re" class="form-control" id="pin" placeholder="Rentroduceti PIN">
                    </div>
            </div>
        </div>
        <input type="hidden" name="act" value="changepin">
        <button type="submit" class="btn btn-primary">Submit</button> 
        </form>

</div>
<script>
$('#myForm').on('submit',function (e){
    e.preventDefault();
    var isValid = true;
    $(".alert").css("display","none");
    var campuriVerificabile = $('.verificare');
    var valoareCnp = $('#input_3').val();
    // var valoarePin = $('#input_4');
    campuriVerificabile.each(function(i, field){
        console.log(field);
        if($(field).val()===''){
            var idElem = $(field).attr('id'); // https://stackoverflow.com/questions/3239598/how-can-i-get-the-id-of-an-element-using-jquery
            console.log(idElem); //id-ul capului
            isValid = false;
            console.log('#eroare_'+idElem);
            $('#eroare_'+idElem).css('display','block');
        }
    })
        if(valoareCnp.length!=13){
            $("#eroare_input_3").css('display','block');
            var mesaj = "Introduceti un cnp valid";
            $("#eroare_input_3").text(mesaj);
            // $('#eroare_'+idElem).css('display','block');
            isValid = false;
        }
        if(isValid){
            $(this).off('submit').submit();
        }
    });
</script>
<?php 
  include("./footer.php");
 ?>