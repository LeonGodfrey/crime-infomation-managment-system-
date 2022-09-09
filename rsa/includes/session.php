<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['rsa']) || trim($_SESSION['rsa']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM user WHERE userId=:id");
	$stmt->execute(['id'=>$_SESSION['rsa']]);
	$rsa = $stmt->fetch();

	$pdo->close();

?>