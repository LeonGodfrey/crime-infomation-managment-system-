<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
					
		$password = $_POST['password'];
		$oldPassword = $io['password'];		
		
			if($password == ""){
				$password = $io['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE user SET password=:password WHERE userId=:id");
				$stmt->execute(['password'=>$password, 'id'=>$io['userId']]);

				
				$_SESSION['success'] = 'Password updated Successfully, Login again!';
                unset($_SESSION['io']);
				
			}
			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
		
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location: ../index.php');

?>