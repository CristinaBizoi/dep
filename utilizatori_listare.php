<?php
  require_once('./_inc/models/Utilizatori.php');
  $utilizatoriModel = new Utilizatori();
  
  $utilizatori= $utilizatoriModel->getUtilizatori();
//   var_dump($pacienti);
//   exit()
  include("./header.php");
?>

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Utilizatori</li>
        </ol>

        <!-- Page Content -->
      
        <div class="d-flex">
        <h1> Listare Utilizatori</h1>
        <a href="./utilizatori_adaugare" class=" ml-auto" > <i class="fa fa-plus"></i> Adaugare</a>
        </div>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nume</th>
                <th scope="col">Prenume</th>
                <th scope="col">Specializare</th>
                <th scope="col">Telefon</th>
                <th scope="col">Rol</th>
                <th scope="col">Spital</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if(count($utilizatori) > 0){
                foreach($utilizatori as $i => $utilizator){
                ?>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td><?php echo $utilizator["nume"]; ?></td>
                    <td><?php echo $utilizator["prenume"]; ?></td>
                    <td><?php echo $utilizator["specializare"]; ?></td>
                    <td><?php echo $utilizator["telefon"]; ?></td>
                    <td>
                    <?php if($utilizator["rol"]==1){
                      echo "Administrator";
                      }elseif($utilizator["rol"]==2){
                        echo "Medic";
                      }
                    ?>
                    </td>
                    <td><?php echo $utilizator["nume_spital"]; ?></td>
                    <td>
                      <a href="utilizator_editare?id=<?php echo $utilizator["id"]; ?>" title="Editeaza utilizator"><i class="far fa-edit"></i></a>
                      <a href="utilizator_stergere?id=<?php echo $utilizator["id"]; ?>" title="Sterge utilizator"><i class="fa fa-trash"></i></a>
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