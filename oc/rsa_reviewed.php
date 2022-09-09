<?php include 'includes/session.php'; ?>

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
                            <h1>Cases Reviewed.</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Cases Reviewed.</li>
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
                            <div class="card">

                                <div class="card-header">                               

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">

                                        <thead>
                                            <th>#</th>
                                            <th>RefNo.</th>
                                            <th>CRB No.</th>
                                            <th>Complainant</th>                                        
                                            
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = $pdo->open();

                                            try {
                                                $count = 1;
                                                $stmt = $conn->prepare("SELECT * FROM case_table WHERE status = :status AND pId = :pId");
                                                $stmt->execute(['status' => 'rsaFeedback', 'pId' => $oc['pId']]);
                                                foreach ($stmt as $row) {
                                                    echo "
                                                        <tr>
                                                            <td>" . $count . "</td>  
                                                            <td>" . $row['refNo'] . "</td> 
                                                            <td>CRB" . $row['cId'] . "</td> 

                                                            <td>" . $row['cName'] . "</td>                                                            
                                                             
                                                            <td>                                 
                                                            <form  action='viewcase_feedback.php' method ='post'>											
                                                            <input type='hidden' value='" . $row['cId'] . "' name='cId'>                              
                                                            <button type='submit' name='save' class='btn btn-success btn-sm btn-flat' ><i class='fa fa-eye'></i> View Case</button>
                                                            </form> 
                                                            </td>                      
                                                            
                                                        </tr>
                                                        ";
                                                    $count++;
                                                }
                                            } catch (PDOException $e) {
                                                echo $e->getMessage();
                                            }

                                            $pdo->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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