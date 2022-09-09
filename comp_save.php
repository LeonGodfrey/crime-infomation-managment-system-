<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
		$cName = $_POST['cName'];					
		$cAge = $_POST['cAge'];        					
		$cOccupation = $_POST['cOccupation'];
        $pId = $do['pId'];
        $offId = $do['offId'];
        $gender = $_POST['gender'];
        $cAddress = $_POST['cAddress']; 
		$cContact = $_POST['cContact']; 
        $cDesc = $_POST['cDesc'];
        $refNo= '#REF'.$do['pId'].$do['userId'].date('ymdh').rand(1, 99);
        $cDate = date('y-m-d');
		$status = 'complaint';

		
                
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO case_table (refNo,cName, cAge, cAddress, cContact, cOccupation, dOId, gender, pId, cDesc, cDate, status) VALUES (:refNo, :cName, :cAge, :cAddress, :cContact, :cOccupation, :dOId, :gender, :pId, :cDesc, :cDate, :status)");
				$stmt->execute(['refNo'=>$refNo,'cName'=>$cName, 'cAge'=>$cAge, 'cAddress'=>$cAddress, 'cContact'=>$cContact, 'cOccupation'=>$cOccupation, 'dOId'=>$dOId, 'gender'=>$gender, 'pId'=>$pId, 'cDesc'=>$cDesc, 'cDate'=>$cDate, 'status'=>$status]);

				$_SESSION['success'] = 'Complaint created successfully: reference No. <b>'.$refNo.'</b>';				
			}			
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			$pdo->close();		
    }
	

	header('location: desk.php');

?>