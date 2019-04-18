<?php
  include("./header.php");
?>

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
        </ol>

        <!-- Page Content -->
        <hr>
        <!-- <p>Esti logat ca:.</p>
         -
        // if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]){
          // echo $_SESSION["type"];
        // }
        // -->

 <h2> Bine ai revenit,<?php echo $_SESSION["prenume"]; ?> </h2>

      </div>
      <!-- /.container-fluid -->

 <?php 
  include("./footer.php");
 ?>