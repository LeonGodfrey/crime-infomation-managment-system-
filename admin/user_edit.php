<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
        $id = $_POST['id'];
		$name = $_POST['name'];					
		$userCode = $_POST['userCode'];        				
		$type = $_POST['type'];
        $pId = $_POST['pId'];
        $offId = $_POST['offId'];
        $courtName = $_POST['courtName'];
                
			$conn = $pdo->open();

			try{
                $stmt = $conn->prepare("UPDATE user SET name = :name, userCode = :userCode, type = :type, offId = :offId, courtName = :courtName, pId = :pId  WHERE userId = :id");
				
				$stmt->execute(['name'=>$name, 'userCode'=>$userCode, 'type'=>$type, 'offId'=>$offId, 'courtName'=>$courtName, 'pId'=>$pId, 'id'=>$id]);

				$_SESSION['success'] = 'User updated successfully';				
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