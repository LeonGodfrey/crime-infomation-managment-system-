<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
		$name = $_POST['name'];					
		$userCode = $_POST['userCode'];
        $password = $_POST['userCode'];						
		$type = $_POST['type'];
        $pId = $_POST['pId'];
        $offId = $_POST['offId'];
        $courtName = $_POST['courtName'];

		$password = password_hash($password, PASSWORD_DEFAULT);
                
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO user (name, userCode, password, type, offId, courtName, pId) VALUES (:name, :userCode, :password, :type, :offId, :courtName, :pId)");
				$stmt->execute(['name'=>$name, 'userCode'=>$userCode, 'password'=>$password, 'type'=>$type, 'offId'=>$offId, 'courtName'=>$courtName, 'pId'=>$pId]);

				$_SESSION['success'] = 'User created successfully';				
			}			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			$pdo->close();		
		
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location: user.php');

?>