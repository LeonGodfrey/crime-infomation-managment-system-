<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
		$name = $_POST['name'];					
		$password = $_POST['password'];
		$oldPassword = $_POST['oldPassword'];		
		
			if($password == ""){
				$password = $admin['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE user SET password=:password, name=:name WHERE userId=:id");
				$stmt->execute(['password'=>$password, 'name'=>$name,'id'=>$admin['userId']]);

				
				$_SESSION['success'] = 'Account updated Successfully, Login again!';
                unset($_SESSION['admin']);
				
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