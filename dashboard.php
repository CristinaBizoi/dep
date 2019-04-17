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
        <h1>Bun venit</h1>
        <hr>
        <p>Esti logat ca:.</p>
        <?php
        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]){
          echo $_SESSION["type"];
        }
        ?>
<pre>
<?php print_r($_SESSION); ?>
</pre>
      </div>
      <!-- /.container-fluid -->

 <?php 
  include("./footer.php");
 ?>