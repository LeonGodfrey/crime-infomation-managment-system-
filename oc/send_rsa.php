<?php
	include 'includes/session.php';

	if(isset($_POST['case'])){

		$cId = $_POST['cId'];
              
        $status = 'rsaSent';		
                
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE case_table SET `status` = :status WHERE cId = :cId");
				$stmt->execute(['status'=>$status, 'cId'=>$cId]);

				$_SESSION['success'] = 'Case sent to RSA for legal advise.</b>';				
			}			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			$pdo->close();	

            
    }

    header('location: cases.php');  
	

	

?>