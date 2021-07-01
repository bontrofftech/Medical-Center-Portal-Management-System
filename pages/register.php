<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $firstname = $_POST['firstname'];
              $nid = $_POST['nid'];
              $gender = $_POST['gender'];
              $phone = $_POST['phonenumber'];
              $email = $_POST['email'];
              $province = $_POST['province'];
              $city = $_POST['city'];
              $username = $_POST['username'];
              $password = $_POST['password'];
              $jobs = $_POST['jobs'];
              mysqli_query($db,"INSERT INTO location
                              (LOCATION_ID, PROVINCE, CITY)
                              VALUES (Null,'$province','$city')");
              $query=mysqli_query($db, "INSERT INTO customer1
                              (FIRST_NAME,NID,PHONE_NUMBER,EMAIL,GENDER,USERNAME2,PASSWORD2,JOB_ID,LOCATION_ID)
                              VALUES ('{$firstname}','{$nid}','{$phone}','{$email}','{$gender}','{$username}','{$password}','{$jobs}',(SELECT MAX(LOCATION_ID) FROM location))");
	
			$okoa=mysqli_query($db, "INSERT INTO users(USERNAME,PASSWORD,TYPE_ID,EMPLOYEE_ID)
								VALUES ('$username','$password','$jobs',(SELECT MAX(EMPLOYEE_ID) FROM customer1))");
							         
             	  echo "<script>alert('Your Data Has Been Submitted ');</script>"; 
    		echo "<script>window.location.href ='login.php'</script>"; 
                        	
            ?>
              
          
