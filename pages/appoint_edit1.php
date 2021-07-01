<?php
include'../includes/connection.php';

			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gen = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $hdate = $_POST['hireddate'];
            $prov = $_POST['province'];
            $cit = $_POST['city'];
            $remarks = $_POST['remarks'];
		
	 			$query = 'UPDATE appointment set CLNAME="'.$fname.'",
					GENDER="'.$lname.'",
					APPDATE="'.$email.'", PHONE_NUMBER="'.$phone.'", APPTIME ="'.$hdate.'", REASON ="'.$prov.'", STATUS ="'.$cit.'", REMARKS ="'.$remarks.'" WHERE
					APPOINTCODE ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Updated Successfully.");
			window.location = "viewappoint.php";
		</script>