<?php
include('../includes/connection.php');
require_once('session.php');
			$zz = $_POST['id'];
			$a = $_POST['firstname'];
            $b = $_POST['lastname'];
            $c = $_POST['gender'];
            $d = $_POST['username'];
            $e = $_POST['password'];
            $f = $_POST['email'];
            $g = $_POST['phone'];
            
            $j = $_POST['province'];
            $k = $_POST['city'];
		
	 			$query = 'UPDATE users u 
	 						join customer1 e on e.EMPLOYEE_ID=u.EMPLOYEE_ID
	 						join location l on l.LOCATION_ID=e.LOCATION_ID
	 						set e.FIRST_NAME="'.$a.'", e.NID="'.$b.'", GENDER="'.$c.'", USERNAME2="'.$d.'", PASSWORD2 = "'.$e.'",  EMAIL="'.$f.'", l.PROVINCE ="'.$j.'", l.CITY ="'.$k.'", PHONE_NUMBER ="'.$g.'" WHERE
					ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
              <?php 

                $sql = 'SELECT ID
                          FROM users';
                $result2 = mysqli_query($db, $sql) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result2)) {
                          $a = $row['ID'];
                
        if ($_SESSION['TYPE']=='Admin'){?>

             <script type="text/javascript">
                alert("You've updated your account successfully.");
                window.location = "index.php";
            </script><?php

        }elseif ($_SESSION['TYPE']=='User'){?>

            <script type="text/javascript">
                alert("You've updated your account successfully.");
                window.location = "pos.php";
            </script><?php
        }
?>

        <?php } ?>