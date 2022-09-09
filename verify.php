<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$userCode = $_POST['userCode'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows from user where userCode = :userCode");
			$stmt->execute(['userCode'=>$userCode]);
			$row = $stmt->fetch();			
			
			if($row['numrows'] > 0 ){
								
				
					if(password_verify($password, $row['password'])){
						if($row['type'] == 'io'){
							$_SESSION['io'] = $row['userId'];
								echo '<script>window.location.href = "io/home.php";</script>';								
							}					
						

						if($row['type'] == 'do'){
							$_SESSION['do'] = $row['userId'];
								echo '<script>window.location.href = "desk.php";</script>';								
							}

							if($row['type'] == 'oc'){
								$_SESSION['oc'] = $row['userId'];
									echo '<script>window.location.href = "oc/home.php";</script>';								
								}

							if($row['type'] == 'rsa'){
								$_SESSION['rsa'] = $row['userId'];
									echo '<script>window.location.href = "rsa/home.php";</script>';								
								}

						if($row['type'] == 'admin'){
							$_SESSION['admin'] = $row['userId'];
								echo '<script>window.location.href = "admin/home.php";</script>';
								
							}

													
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
				
			}
			else{
				$_SESSION['error'] = 'userCode not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	$pdo->close();

	echo '<script>window.location.href = "index.php";</script>';

?>