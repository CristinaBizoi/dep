<?php
    if(isset($_POST) && !empty($_POST)){
        require_once("./_inc/models/Pacienti.php");
        $pacient = new Pacienti();
        if(!isset($_POST['acord_fisa'])){
            $_POST['acord_fisa']=0;
        }
        $pacient->addPacient($_POST);
        header('Location:./pacienti_listare');
        exit();
    }
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
        <h1>Pacienti adaugare</h1>
        <hr>
        <form method="POST" action="./pacienti_adaugare" id="myForm">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="nume_pacient">Nume</label>
                            <input type="text" name="nume_pacient" class="form-control form-field verificare" id="input_1" aria-describedby="nume_pacient" placeholder="Introduceti nume">
                            <div class="alert alert-danger" role="alert" style="display:none" id="eroare_input_1">
                             Nu ati introdus numele
                            </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="prenume_pacient">Prenume</label>
                        <input type="text" name="prenume_pacient" class="form-control form-field verificare" id="input_2" placeholder="Introduceti prenume">
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
                        <input type="text" name="cnp" class="form-control form-field verificare" id="input_3" placeholder="CNP">
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_input_3">
                            Nu ati introdus cnp
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="pin">Pin</label>
                        <input type="number" name="pin" class="form-control form-field verificare" id="input_4" placeholder="Introduceti PIN">
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_input_4">
                         Nu ati introdus pinul
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="grupa_sange">Grupa sanguina</label>
                        <input type="text" name="grupa_sange" class="form-control form-field" id="grupa_sange" placeholder="Grupa sanguina">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="rh">Adaugare Rh</label>
                        <select class="form-control" id="rh" name="rh">
                            <option value="1">+</option>
                            <option value="2">-</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control form-field" id="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" name="telefon" class="form-control form-field" id="telefon" placeholder="Telefon">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="data_nastere">Data nasterii</label>
                        <input type="date" name="data_nastere" class="form-control form-field" id="data_nastere" placeholder="Data nasterii">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="sex">Sex</label><br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="sex" id="masculin" value="1" class="custom-control-input">
                    <label class="custom-control-label form-field" for="masculin">Masculin</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="sex" id="feminin" value="2"  class="custom-control-input">
                    <label class="custom-control-label form-field" for="feminin">Feminin</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="acord_fisa" value="1" id="acord_fisa">
                    <label class="form-check-label" for="acord_fisa">
                        Sunt de acord cu fisa medicala
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    </div>
      <!-- /.container-fluid -->
<script>
  $('#myForm').on('submit',function (e){
            e.preventDefault();
            var isValid = true;
            $(".alert").css("display","none");
           //selectez toate capurile care au clasa verificare
           var campuriVerificabile = $('.verificare');
           var valoareCnp = $('#input_3').val();
           var valoarePin = $('#input_4').val();
           console.log(campuriVerificabile);

           //parcurg campurile rezultate https://stackoverflow.com/questions/4735342/jquery-to-loop-through-elements-with-the-same-class
           campuriVerificabile.each(function(i, field){
             // i este pozitia in array
             // field este input-ul
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
           if(valoarePin.length != 4){
                $("#eroare_input_4").css('display','block');
                var mesaj = "Trebuie sa contina 4 caractere";
                $("#eroare_input_4").text(mesaj);
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