<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['admin'])){		
		echo '<script>window.location.href = "admin/home.php";</script>';
	}
	if(isset($_SESSION['oc'])){
		echo '<script>window.location.href = "oc/home.php";</script>';
	}

	if(isset($_SESSION['rsa'])){
		echo '<script>window.location.href = "rsa/home.php";</script>';
	}

	if(isset($_SESSION['io'])){
		echo '<script>window.location.href = "io/home.php";</script>';
	}

	if(isset($_SESSION['do'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM user WHERE userId=:id");
			$stmt->execute(['id'=>$_SESSION['do']]);
			$do = $stmt->fetch();			
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>