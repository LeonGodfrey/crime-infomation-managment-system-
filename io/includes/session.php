<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['io']) || trim($_SESSION['io']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM user WHERE userId=:id");
	$stmt->execute(['id'=>$_SESSION['io']]);
	$io = $stmt->fetch();

	$pdo->close();

?>