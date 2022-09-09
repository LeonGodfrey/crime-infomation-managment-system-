<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition layout-top-nav layout-navbar-fixed ">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <br>

        <div style="background-color:#fff;" class="content-wrapper">
            <div class="container">

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
                                        <h2>Change password</h2>

                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST" action="profile_update.php">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Enter New Password</label>
                                                        <input id="myInput" type="password" class="form-control" name="password" value="" required>
                                                        <br>
                                                        <input type="checkbox" onclick="myFunction()">Show Password
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-sm-6">

                                                <a href="desk.php" class="btn btn-dark btn-flat" name="complaint">back to desk</a>
                                            </div>                                            
                                            <div class="col-sm-6">
                                                <!-- text input -->
                                                <button type="submit" class="btn btn-dark btn-flat" name="save"><i class="fa fa-save"></i> Update</button>
                                            </div>
                                        </div>

                                            <!-- end form body -->

                                    </div>

                                    
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>

        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>