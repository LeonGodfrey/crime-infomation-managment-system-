

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
      <h3>
              <?php
              $stmt = $conn->prepare("SELECT pName from policeStation where pId = :pId");
              $stmt->execute(['pId' => $io['pId']]);
              $row = $stmt->fetch();
              echo $row['pName'];
              ?>
            </h3>
      </li>
      
    </ul>

    
  </nav>
  <!-- /.navbar -->

