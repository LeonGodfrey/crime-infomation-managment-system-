<?php include 'includes/session.php';

if (!isset($_POST['save'])) {
    echo '<script>window.location.href = "cases.php";</script>';
}
?>



<?php include 'includes/header.php'; ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Case file</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">case</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                        unset($_SESSION['error']);
                    }
                    if (isset($_SESSION['success'])) {
                        echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
                        unset($_SESSION['success']);
                    }
                    ?>
                    <div class="row">
                        <div class="col-12">

                            <?php

                            $cId = $_POST['cId'];
                            $stmt = $conn->prepare("SELECT * FROM case_table WHERE cId = :cId");
                            $stmt->execute(['cId' => $cId]);
                            $row = $stmt->fetch();

                            ?>




                            <div class="card">
                                <div class="card-header">
                                    <h2>Case CRB<?php echo $row['cId']; ?></h2>

                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="POST" action="send_rsa.php">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Complainant Name</label>
                                                    <input type="text" class="form-control" name="cId" value="<?php echo $row['cId']; ?>" hidden>
                                                    <input type="text" class="form-control" value="<?php echo $row['cName']; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Complainant Address</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['cAddress']; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Complainant age</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['cAge']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Complainant gender</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['gender']; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Complainant Contact</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['cContact']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Complainant Occupation</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['cOccupation']; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Statement</label>
                                                    <textarea class="form-control" rows="3" disabled><?php echo $row['cDesc']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <p>Investigation Section</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Preliminary Findings</label>
                                                    <textarea class="form-control" rows="3" disabled><?php echo $row['pFindings']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Investigation Officer comment</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['iComment']; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- end form body -->

                                </div>


                                </form>

                            </div>
                        </div>
                    </div>
            </section>

        </div>
        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/products_modal2.php'; ?>

    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>


</body>

</html>