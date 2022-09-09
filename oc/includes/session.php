<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['oc']) || trim($_SESSION['oc']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM user WHERE userId=:id");
	$stmt->execute(['id'=>$_SESSION['oc']]);
	$oc = $stmt->fetch();

	$pdo->close();

?>