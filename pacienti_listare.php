<?php
  require_once('./_inc/models/Pacienti.php');
  $pacientiModel = new Pacienti();
  
  $pacienti= $pacientiModel->getPacienti();
//   var_dump($pacienti);
//   exit()
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
        <h1> Listare Pacienti</h1>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nume</th>
                <th scope="col">Prenume</th>
                <th scope="col">CNP</th>
                <th scope="col">Telefon</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if(count($pacienti) > 0){
                foreach($pacienti as $i => $pacient){
                ?>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td><?php echo $pacient["nume"]; ?></td>
                    <td><?php echo $pacient["prenume"]; ?></td>
                    <td><?php echo $pacient["cnp"]; ?></td>
                    <td><?php echo $pacient["telefon"]; ?></td>
                    <td>
                      <a href="pacient_fise?id=<?php echo $pacient["id"]; ?>" title="Vezi fisele medicale"><i class="fas fa-clipboard-list"></i></i></a>
                      <a href="fisa_adaugare?id=<?php echo $pacient["id"]; ?>" title="Adaugare fisa medicala"><i class="fas fa-plus"></i></a>
                      <a href="pacient_editare?id=<?php echo $pacient["id"]; ?>" title="Editeaza utilizator"><i class="far fa-edit"></i></a>
                      <a href="pacient_stergere?id=<?php echo $pacient["id"]; ?>" title="Sterge utilizator"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                }
            }

            ?>
            </tbody>
        </table>

      </div>
      <!-- /.container-fluid -->

 <?php 
  include("./footer.php");
 ?>