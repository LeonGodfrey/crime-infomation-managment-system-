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
                            <h1>Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
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
                                <a href="user_add.php" class="btn btn-primary btn-sm btn-flat" ><i class="fas fa-plus"></i> Add a new user</a>

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
                                            <th>Name</th>
                                            <th>UserCode</th>                                            
                                            <th>Type</th>
                                            <th>OfficerId</th>
                                            <th>policeStation</th>
                                            <th>Court</th>                                            
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = $pdo->open();

                                            try {
                                                $count = 1;
                                                $stmt = $conn->prepare("SELECT * FROM user left join policeStation on user.pId = policeStation.pId where type not like :admin order by policeStation.pName");
                                                $stmt->execute(['admin'=>'admin']);
                                                foreach ($stmt as $row) {
                                                    echo "
                                                        <tr>
                                                            <td>" . $count . "</td>  
                                                            <td>" . $row['name'] . "</td>                            
                                                            <td>" . $row['userCode'] . "</td>                                                          
                                                            <td>" . $row['type'] . "</td> 
                                                            <td>" . $row['offId'] . "</td>                            
                                                            <td>" . $row['pName'] . "</td>   
                                                            <td>" . $row['courtName'] . "</td>                          
                                                            
                                                            <td>
                                                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['userId']."'><i class='fa fa-edit'></i> Edit</button>
                                                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['userId']."'><i class='fa fa-trash'></i> Delete</button>                            
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
        <?php include 'includes/user_modal.php'; ?>


    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>

    <script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

 
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'user_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){      
      $('.userId').val(response.userId);    
      $('#edit_userCode').val(response.userCode);
      $('#edit_name').val(response.name);      
      $('#edit_station').val(response.pId);
      $('#edit_offId').val(response.offId);
      $('#edit_type').val(response.type);
      $('#edit_courtName').val(response.courtName);  
    }
  });
}

</script>

    
</body>

</html>