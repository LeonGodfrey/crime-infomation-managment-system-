<!-- Close 2 divs -->

<!-- Navbar -->
<header class="main-header">
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-black">
    <div class="container">
      <a href="desk.php" class="navbar-brand">
        <h1>CIMS</h1>

      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <h3>@
              <?php
              $stmt = $conn->prepare("SELECT pName from policeStation where pId = :pId");
              $stmt->execute(['pId' => $do['pId']]);
              $row = $stmt->fetch();
              echo $row['pName'];
              ?>
            </h3>
          </li>


        </ul>


      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">


        <li><a class='nav-link' href='profile.php'><b>Officer: <?php echo $do['name']; ?></b></a></li>
        <li><a class='nav-link' href='logout.php'><b>LOGOUT</b></a></li>


      </ul>

    </div>

  </nav>


</header>

<!-- /.navbar -->