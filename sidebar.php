    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
     <?php if(isset($_SESSION["type"]) && $_SESSION["type"]=="user"){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./pacienti_listare">
            <i class="fas fa-user-injured"></i>
          <span>Pacienti</span></a>
      </li>
      <?php } ?>
      <?php if(isset($_SESSION["type"]) && $_SESSION["type"]=="user"){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./utilizatori_listare">
        <i class="fas fa-users"></i>
          <span>Utilizatori</span></a>
      </li>
      <?php } ?>
      <?php if(isset($_SESSION["type"]) && $_SESSION["type"]=="pacient"){ ?>
      <li class="nav-item">
        <a class="nav-link" href="./pacient_fise?id=<?php echo $_SESSION["user_id"]; ?>">
        <i class="far fa-list-alt"></i>
          <span>Fisele mele</span></a>
      </li>
      <?php } ?>
    </ul>