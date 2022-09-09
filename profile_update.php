<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
		$name = $_POST['name'];					
		$password = $_POST['password'];
		$oldPassword = $do['password'];		
		
			if($password == ""){
				$password = $do['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE user SET password=:password WHERE userId=:id");
				$stmt->execute(['password'=>$password,'id'=>$do['userId']]);

				$_SESSION['success'] = 'Password updated Successfully, Login with new password!';
                unset($_SESSION['do']);
				
			}
			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
		
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:index.php');
    

?>