<?php
if(isset($_POST)&&!empty($_POST)){
    $error = false;
    if ($_POST["parola"] != $_POST["parola_re"]){
        $error = true;
    }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $error = true;
    }
    if ($error == false){
        require_once("./_inc/models/Utilizatori.php");
        $utilizator = new Utilizatori();
        $utilizator->addUtilizator($_POST);
        header('Location:./utilizatori_listare');
        exit();
    }
}
require_once("./_inc/models/Spitale.php");
$spitaleModel = new Spitale();
$spitale = $spitaleModel->getSpitale();
include("./header.php");
?>

      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="./utilizatorilistare">Utilizatori</a></li>
            <li class="breadcrumb-item active">Adaugare utilizator</li>
        </ol>

        <!-- Page Content -->
        <h1>Utilizator adaugare</h1>
        <hr>
        <form method="POST" action="./utilizatori_adaugare" id="formular_utilizatori">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="nume_utilizator">Nume</label>
                            <input type="text" name="nume_utilizator" class="form-control" id="nume_utilizator" aria-describedby="nume_utilizator" placeholder="Introduceti nume">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="prenume_utilizator">Prenume</label>
                        <input type="text" name="prenume_utilizator" class="form-control" id="prenume_utilizator" placeholder="Introduceti prenume">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control verificare" id="password" name="parola" placeholder="Introduceti parola">
                            <div class="alert alert-danger" role="alert" style="display:none" id="eroare_password">
                                Nu ati introdus parola
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="password_re">Password</label>
                            <input type="password" class="form-control verificare" id="password_re" name="parola_re" placeholder="Reintroduceti parola">
                            <div class="alert alert-danger" role="alert" style="display:none" id="eroare_password_re">
                                Nu ati introdus parola
                            </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="rol"> Selecteaza rol </label>
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_rol">
                             Alegeti un rol
                         </div> 
                        <select class="form-control verificare" id="rol" name="rol">
                            <option value="">Selecteaza</option>
                            <option value="1">Administrator</option>
                            <option value="2">Medic</option>
                        
                        </select>
                     
                    </div>
                </div>
            </div>
            <div class="row" id="specializare" style="display:none">
                <div class="col-6">
                    <div class="form-group">
                        <label for="specializare">Specializare</label>
                        <input type="text" name="specializare" class="form-control" id="specializare" placeholder="Introduceti specializarea">
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_specializare">
                            Nu ati introdus specializarea
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control verificare" id="email" placeholder="E-mail">
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_email">
                            Nu ati introdus emailul
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" name="telefon" class="form-control" id="telefon" placeholder="Telefon">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="id_spital">Selecteaza spital </label>
                        <select class="form-control" id="id_spital" name="id_spital">
                            <?php
                            foreach( $spitale as $key => $spital){
                            ?>
                                <option value="<?php echo $spital["id"]; ?>"><?php echo $spital["nume"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    </div>
      <!-- /.container-fluid -->
<script>
$('#rol').on('change',function(e){ //vedem cand schimba valoarea din select
    console.log(this); // elementul din DOM (selectul)
    console.log($(this).val()); //Valoarea elementului 
    var rol= $(this).val();
    if(rol==2){
        document.getElementById('specializare').style.display ='block';
    }else{
        document.getElementById('specializare').style.display='none';
    }

})
$('#formular_utilizatori').on('submit',function (e){
            e.preventDefault();
            var isValid = true;
            $(".alert").css("display","none");
           //selectez toate capurile care au clasa verificare
           var campuriVerificabile = $('.verificare');
           var valoareParola = $('#password').val();
           var valoareParolaRe = $('#password_re').val();
           var idParola = $('#password').attr('id');
           var idParolaRe = $('#password_re').attr('id');
           var idSpecializare = $('#specializare').attr('id');
           var valoareSpecializare = $('#specializare').val();
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
            if(valoareParola!==valoareParolaRe){
                isValid = false;
                $('#eroare_'+idParolaRe).css('display','block');
                $('#eroare_'+idParola).css('display','block');
                var mesaj = "Parolele nu sunt la fel";
                $('#eroare_'+idParolaRe).text(mesaj);
                $('#eroare_'+idParola).text(mesaj);

           }
           var rol= $('#rol').val(); //ne asiguram ca e setata variabila
            if(rol==2){
                if(valoareSpecializare==''){
                    $('#eroare_'+idSpecializare).css('display','block');
                    var mesaj = "Nu ati completat specializarea";
                    $('#eroare_'+idSpecializare).text(mesaj);
                    isValid = false
                }
            }
            if(isValid){
                $(this).off('submit').submit();
            }
           console.log(campuriVerificabile)
           
        });

</script>


 <?php 
  include("./footer.php");
 ?>