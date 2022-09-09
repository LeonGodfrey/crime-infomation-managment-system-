<?php
	include 'includes/session.php';

	if(isset($_POST['case'])){

		$cId = $_POST['cId'];
		$feedback = $_POST['feedback'];
              
        $status = 'rsaFeedback';		
                
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE case_table SET `status` = :status, `feedback` = :feedback WHERE cId = :cId");
				$stmt->execute(['status'=>$status, 'feedback'=>$feedback, 'cId'=>$cId]);

				$_SESSION['success'] = 'Feedback sent to OC';				
			}			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			$pdo->close();	

            
    }

    header('location: cases.php');  
	

	

?>