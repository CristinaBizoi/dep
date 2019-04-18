<?php
    if(isset($_GET["cauta_pacient"]) && strlen($_GET["cauta_pacient"])>0){
      $termen = $_GET["cauta_pacient"];
      $where = "`pacienti`.`nume` LIKE '%".$termen."%'
            OR `pacienti`.`prenume` LIKE '%".$termen."%'
            OR `pacienti`.`cnp` LIKE '%".$termen."%'";
      
      /* cautare dupa un text
      = trebuie sa fie identic
      LIKE returneaza daca se potriveste intr-un camp
      LIKE => https://www.w3schools.com/sql/sql_like.asp
  
      */
  }else{
      //Daca nu gasesc un termen de cautat in where ca fi 1, adica caut tot si $termen va fi gol ca sa nu primesc erori (Notice:)
      $termen = "";
      $where ="1";
  }
  require_once('./_inc/models/Pacienti.php');
  $pacientiModel = new Pacienti();
  $pacienti= $pacientiModel->getPacienti($where);


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
          <li class="breadcrumb-item active">Lista pacienti</li>
        </ol>

        <!-- Page Content -->
        <div class="d-flex">
        <h1> Listare Pacienti</h1>
        <a href="./pacienti_adaugare" class=" ml-auto" > <i class="fa fa-plus"></i> Adaugare</a>
        </div>
        

        <div class="row">
            <div class="col-md-12">
            <form class="form-inline" action="./pacienti_listare" method="get">
                <div class="form-group">
                    <label for="name">Cauta Pacient: </label> <br>

                    <input type="text" class="form-control ml-2" name="cauta_pacient" id="name" placeholder="Cauta pacient" value="<?php echo $termen; ?>">
                </div>
                <button type="submit" class="btn btn-light">Cauta</button>
                </form>
            </div>
        </div>



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