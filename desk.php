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
										<h2>Complainant Information</h2>

									</div>
									<div class="card-body">
										<form class="form-horizontal" method="POST" action="comp_save.php">
											<div class="row">
												<div class="col-sm-12">
													<!-- text input -->
													<div class="form-group">
														<label>Complainant Name</label>
														<input type="text" class="form-control" name="cName" value="" required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<!-- text input -->
													<div class="form-group">
														<label>Complainant Address</label>
														<input type="text" class="form-control" name="cAddress" value="" required>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<!-- text input -->
													<div class="form-group">
														<label>Complainant age</label>
														<input type="number" class="form-control" name="cAge" value="" required>
													</div>
												</div>
												<div class="col-sm-6">
													<!-- text input -->
													<div class="form-group">
														<label>Complainant gender</label>
														<select class="form-control" name="gender" required>
															<option>Select user gender </option>
															<option value='male'>male</option>
															<option value="female">female</option>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6">
													<!-- text input -->
													<div class="form-group">
														<label>Complainant Contact</label>
														<input type="tel" class="form-control" name="cContact" value="" required>
													</div>
												</div>
												<div class="col-sm-6">
													<!-- text input -->
													<div class="form-group">
														<label>Complainant Occupation</label>
														<input type="text" class="form-control" name="cOccupation" value="" required>
													</div>
												</div>
											</div>


											<div class="row">
												<div class="col-sm-12">
													<!-- text input -->
													<div class="form-group">
														<label>Statement</label>
														<textarea class="form-control" name="cDesc" rows="3" required></textarea>
													</div>
												</div>
											</div>

											<!-- end form body -->

									</div>

									<button type="submit" class="btn btn-dark btn-flat" name="save"><i class="fa fa-save"></i> Submit complaint</button>
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
</body>

</html>