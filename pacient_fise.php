<?php
//id-ul pacientului
if(isset($_GET["id"]) && $_GET["id"]>0){
    $id = $_GET["id"];
}else{
    exit();
}
// incarcam fisierele
  require_once('./_inc/models/Pacienti.php');
  require_once("./_inc/models/FiseMedicale.php");
  //instantiem modele
  $pacientiModel = new Pacienti();
  $fiseMedicaleModel = new FiseMedicale();
  
  //selectam datele despre pacient
  $pacient = $pacientiModel->getPacient($id);
  //selectam fisele medicale pentru pacientul selectat
  $fise = $fiseMedicaleModel->getPacientFise($id);

  //TODO: verificari daca nu exista pacientul
  include("./header.php");
?>

      <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/pacienti_listare">Pacienti</a></li>
            <li class="breadcrumb-item active">Fise pacient</li>
        </ol>

        <!-- Page Content -->
        <h1>Fise pacient</h1>
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
        <h2>Fise</h2>
        <?php 
            if(count($fise) > 0){ ?>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tip fisa</th>
                <th scope="col">Data</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($fise as $i => $fisa){
                ?>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td><?php echo $fisa["tip_fisa"]; ?></td>
                    <td><?php echo date("d.m.Y H:i:s",strtotime($fisa["data_adaugare"])); ?></td>
                    <td>
                      <a href="fisa_vizualizare?id=<?php echo $pacient["id"]; ?>" title="Vezi fisa medicala"><i class="far fa-eye"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
            
            </tbody>
        </table>
        <?php
            }else{ ?>
            <p>Nu exista fise medicale pentru acest utilizator.</p>
            <?php }  ?>
      </div>
      <!-- /.container-fluid -->

 <?php 
  include("./footer.php");
 ?>