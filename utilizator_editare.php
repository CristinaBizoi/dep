<?php
    if(isset($_GET["id"]) && $_GET["id"]>0){
        $id = $_GET["id"];
    }else{
        exit();
    }
    require_once('./_inc/models/Utilizatori.php');
    require_once('./_inc/models/Spitale.php');
    $utilizatorObject = new Utilizatori();
    $spitaleObject = new Spitale();
    if(isset($_POST)&&!empty($_POST)&&$_POST["act"]=="changedetails"){
        $utilizatorObject->editUtilizator($id, $_POST);
        header('Location:./utilizatori_listare');
        exit();
    }
    $spitale = $spitaleObject->getSpitale();
    $utilizator = $utilizatorObject->getUtilizator($id);
    if(isset($_POST)&&!empty($_POST)&&$_POST["act"]=="changepassword"){
        $error = false;
        if ($_POST["parola_noua"] != $_POST["parola_noua_re"]){
            $error = true;
        }
        if($utilizator["parola"]!==md5($_POST["parola_veche"])){
            $error = true;
        }
        if ($error == false){
            $utilizatorObject->editUtilizatorParola($id, $_POST["parola_noua"]);
            header('Location:./utilizatori_listare');
            exit();
        }
    }
    include("./header.php");
?>

      <div class="container-fluid  pb-5">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="./utilizatori_listare">Utilizatori</a></li>
            <li class="breadcrumb-item active">Editare utilizator</li>
        </ol>
        <!-- Page Content -->
        <h1>Utilizator editare</h1>
        <hr>
        <form method="POST" action="./utilizator_editare?id=<?php echo $utilizator["id"]; ?>" id="formular_utilizatori_editare">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="nume_utilizator">Nume</label>
                            <input type="text" name="nume_utilizator" class="form-control" id="nume_utilizator" aria-describedby="nume_utilizator"  value="<?php echo $utilizator["nume"]; ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="prenume_utilizator">Prenume</label>
                        <input type="text" name="prenume_utilizator" class="form-control" id="prenume_utilizator"  value="<?php echo $utilizator["prenume"]; ?>">
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
                        <select class="form-control" id="rol" name="rol">
                            <option value="1" <?php if($utilizator["rol"]==1){ echo "selected";}?>>Administrator</option>
                            <option value="2" <?php if($utilizator["rol"]==2){ echo "selected";}?>>Medic</option>
                        </select>
                        
                    </div>
                </div>
            </div>
            <div class="row" id="specializare_camp"  <?php if($utilizator["rol"]==1){ echo 'style="display:none"'; } ?>>
                <div class="col-6">
                    <div class="form-group">
                        <label for="specializare">Specializare</label>
                        <input type="text" name="specializare" class="form-control" id="specializare"  value="<?php echo $utilizator["specializare"]; ?>">
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
                        <input type="email" name="email" class="form-control verificare" id="email"  value="<?php echo $utilizator["email"]; ?>">
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_email">
                            Nu ati introdus emailul
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" name="telefon" class="form-control" id="telefon"  value="<?php echo $utilizator["telefon"]; ?>">
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
                                if($spital["id"] == $utilizator["id_spital"]){
                                    $checked = "selected";
                                }else{
                                    $checked = "";
                                }
                            ?>
                                <option value="<?php echo $spital["id"]; ?>" <?php echo $checked ; ?>><?php echo $spital["nume"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="act" value="changedetails">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h3 class="my-4">Editrare paroala</h3>

        <form method="POST" action="./utilizator_editare?id=<?php echo $utilizator["id"]; ?>" id="formular_utilizatori_ediatare_parola">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="old_password">Parola veche</label>
                            <input type="password" class="form-control necesita_verificare" id="old_password" name="parola_veche" placeholder="Introduceti parola">
                            <div class="alert alert-danger" role="alert" style="display:none" id="eroare_old_password">
                                Nu ati introdus parola veche
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="password">Parola noua</label>
                            <input type="password" class="form-control necesita_verificare" id="password" name="parola_noua" placeholder="Introduceti parola">
                            <div class="alert alert-danger" role="alert" style="display:none" id="eroare_password">
                                Nu ati introdus parola
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password_re">Reintroducere parola noua</label>
                        <input type="password" class="form-control necesita_verificare" id="password_re" name="parola_noua_re" placeholder="Reintroduceti parola">
                        <div class="alert alert-danger" role="alert" style="display:none" id="eroare_password_re">
                                Nu ati introdus parola
                            </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="act" value="changepassword">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    </div>
<script>
    $('#rol').on('change',function(e){ //vedem cand schimba valoarea din select
        console.log(this); // elementul din DOM (selectul)
        console.log($(this).val()); //Valoarea elementului 
        var rol= $(this).val();
        if(rol==2){
            document.getElementById('specializare_camp').style.display ='block';
        }else{
            document.getElementById('specializare_camp').style.display='none';
        }

    })
    $('#formular_utilizatori_editare').on('submit',function (e){
            e.preventDefault();
            var isValid = true;
            $(".alert").css("display","none");
            //selectez toate capurile care au clasa verificare
            var campuriVerificabile = $('.verificare');
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
$('#formular_utilizatori_editare_parola').on('submit',function (e){
    e.preventDefault();
    var isValid = true;
    $(".alert").css("display","none");
    var campuriVerificabile = $('.necesita_verificare');
    var valoareParola = $('#password').val();
    var valoareParolaRe = $('#password_re').val();
    var idParola = $('#password').attr('id');
    var idParolaRe = $('#password_re').attr('id');
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
       if(isValid){
                $(this).off('submit').submit();
            }
           console.log(campuriVerificabile)
});
</script>
      <!-- /.container-fluid -->
 <?php 
  include("./footer.php");
 ?>