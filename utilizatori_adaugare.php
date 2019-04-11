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
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>

        <!-- Page Content -->
        <h1>Utilizator adaugare</h1>
        <hr>
        <form method="POST" action="./utilizatori_adaugare">
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
                            <input type="password" class="form-control" id="password" name="parola" placeholder="Introduceti parola">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                            <label for="password_re">Password</label>
                            <input type="password" class="form-control" id="password_re" name="parola_re" placeholder="Reintroduceti parola">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="rol"> Selecteaza rol </label>
                        <select class="form-control" id="rol" name="rol">
                            <option value="1">Administrator</option>
                            <option value="2">Medic</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="specializare">Specializare</label>
                        <input type="text" name="specializare" class="form-control" id="specializare" placeholder="Introduceti specializarea">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
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

 <?php 
  include("./footer.php");
 ?>