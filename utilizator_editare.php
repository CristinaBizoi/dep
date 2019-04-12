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

      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>

        <!-- Page Content -->
        <h1>Utilizator editare</h1>
        <hr>
        <form method="POST" action="./utilizator_editare?id=<?php echo $utilizator["id"]; ?>">
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
                        <select class="form-control" id="rol" name="rol">
                            <option value="1" <?php if($utilizator["rol"]==1){ echo "selected";}?>>Administrator</option>
                            <option value="2" <?php if($utilizator["rol"]==2){ echo "selected";}?>>Medic</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="specializare">Specializare</label>
                        <input type="text" name="specializare" class="form-control" id="specializare"  value="<?php echo $utilizator["specializare"]; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email"  value="<?php echo $utilizator["email"]; ?>">
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

        <form method="POST" action="./utilizator_editare?id=<?php echo $utilizator["id"]; ?>">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="old_password">Parola veche</label>
                            <input type="password" class="form-control" id="old_password" name="parola_veche" placeholder="Introduceti parola">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="password">Parola noua</label>
                            <input type="password" class="form-control" id="password" name="parola_noua" placeholder="Introduceti parola">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password_re">Reintroducere parola noua</label>
                        <input type="password" class="form-control" id="password_re" name="parola_noua_re" placeholder="Reintroduceti parola">
                    </div>
                </div>
            </div>
            <input type="hidden" name="act" value="changepassword">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    </div>
      <!-- /.container-fluid -->
 <?php 
  include("./footer.php");
 ?>