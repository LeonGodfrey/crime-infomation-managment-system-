<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
		$name = $_POST['name'];					
		$address = $_POST['address'];
		
			
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO policeStation (pName, pAddress) VALUES (:name, :address)");
				$stmt->execute(['address'=>$address, 'name'=>$name]);

				$_SESSION['success'] = 'Station created successfully';				
			}			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			$pdo->close();		
		
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location: stations.php');

?>