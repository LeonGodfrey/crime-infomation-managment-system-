<?php
include 'includes/session.php';
include 'includes/format.php';
?>
<?php

?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <h2>RSA's Dashboard</h2>

          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
              <a href="cases.php">
                <div class="info-box">
                  <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-book"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">New cases from OC </span>
                    <span class="info-box-number">
                      <?php
                      $stmt = $conn->prepare("SELECT *, count(*) AS numrows FROM case_table WHERE status = :status AND pId = :pId");
                      $stmt->execute(['status' => 'rsaSent', 'pId' => $rsa['pId']]);
                      $drow = $stmt->fetch();

                      echo $drow['numrows'];
                      ?>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->


            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>


            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-6">
              <a href="rsa_reviewed.php">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-check"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Cases sent to OC with legal feedback</span>
                    <span class="info-box-number">
                      <?php
                      $stmt = $conn->prepare("SELECT *, count(*) AS numrows FROM case_table WHERE status = :status AND pId = :pId");
                      $stmt->execute(['status' => 'rsaFeedback', 'pId' => $rsa['pId']]);
                      $drow = $stmt->fetch();

                      echo $drow['numrows'];
                      ?>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </a>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <?php include 'includes/footer.php'; ?>
  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>

</body>

</html>