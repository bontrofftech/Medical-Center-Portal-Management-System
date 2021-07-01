<?php
include'../includes/connection.php';
?>
            <?php
              $fname = $_POST['firstname'];
              $nid = $_POST['nid'];
              $staffno = $_POST['staffno'];
              $gen = $_POST['gender'];
              $email = $_POST['email'];
              $phone = $_POST['phonenumber'];
              $jobb = $_POST['jobs'];
              $hdate = $_POST['hireddate'];
              $prov = $_POST['province'];
              $cit = $_POST['city'];
              $hosy = $_POST['hosy'];
              
              mysqli_query($db,"INSERT INTO location
                              (LOCATION_ID, PROVINCE, CITY)
                              VALUES (Null,'$prov','$cit')");
              mysqli_query($db,"INSERT INTO employee
                              (EMPLOYEE_ID, FIRST_NAME, LAST_NAME,GENDER, EMAIL, PHONE_NUMBER,STAFFNO,HOSY,JOB_ID, HIRED_DATE, LOCATION_ID)
                              VALUES (Null,'{$fname}','{$nid}','{$gen}','{$email}','{$phone}','{$staffno}','{$hosy}','{$jobb}','{$hdate}',(SELECT MAX(LOCATION_ID) FROM location))");
              header('location:employee.php');
            ?>