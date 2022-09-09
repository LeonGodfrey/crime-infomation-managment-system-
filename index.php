<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>

<!-- start form -->

<body class="hold-transition login-page">
  <div class="register-box">
    <?php
    if (isset($_SESSION['error'])) {
      echo "
          <div class='callout callout-danger text-center s-danger'>
            <p>" . $_SESSION['error'] . "</p> 
          </div>
        ";
      unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
      echo "
          <div class='callout callout-success text-center s-success'>
            <p>" . $_SESSION['success'] . "</p> 
          </div>
        ";
      unset($_SESSION['success']);
    }
    ?>
    <div class="login-box">
  <div class="login-logo">
    <h2><b>CIMS</b></h2>
  </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="verify.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name='userCode' placeholder="user code">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-code"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="myInput" type="password" class="form-control" name='password' placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            
          </div>
          <input type="checkbox" onclick="myFunction()">Show Password
          
          <div class="col-4">
          <br>
            <button type="submit" class="btn btn-primary btn-block" name='login'>Sign In</button>
          </div>

        </form>



      </div>
      <!-- /.login-card-body -->
    </div>
    
    <?php include 'includes/scripts.php' ?>
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