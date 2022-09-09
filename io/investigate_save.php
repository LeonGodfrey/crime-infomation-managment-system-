<?php
	include 'includes/session.php';

	if(isset($_POST['case'])){

		$cId = $_POST['cId'];
        $pFindings = $_POST['pFindings'];					
		$iComment = $_POST['iComment']; 
        $iDate = date('y-m-d');   
        			
		
        $iOId = $io['offId'];        
        $status = 'investigatedCase';		
                
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE case_table SET pFindings = :pFindings, iDate = :iDate, iComment = :iComment, iOId = :iOId, `status` = :status WHERE cId = :cId");
				$stmt->execute(['pFindings'=>$pFindings,'iComment'=>$iComment, 'iOId'=>$iOId, 'status'=>$status, 'iDate'=>$iDate, 'cId'=>$cId]);

				$_SESSION['success'] = 'Investigation completed successfully.</b>';				
			}			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			$pdo->close();	

            header('location: complaints.php');
    }

    if(isset($_POST['complaint'])){

		$cId = $_POST['cId'];
        $pFindings = $_POST['pFindings'];					
		$iComment = $_POST['iComment']; 
        $iDate = date('y-m-d');   
        			
		
        $iOId = $io['offId'];        
        $status = 'discardedComplaint';		
                
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE case_table SET pFindings = :pFindings, iDate = :iDate, iComment = :iComment, iOId = :iOId, `status` = :status WHERE cId = :cId");
				$stmt->execute(['pFindings'=>$pFindings,'iComment'=>$iComment, 'iOId'=>$iOId, 'status'=>$status, 'iDate'=>$iDate, 'cId'=>$cId]);

				$_SESSION['success'] = 'Investigation completed successfully.</b>';				
			}			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			$pdo->close();	

            header('location: complaints.php');
    }
	

	

?>