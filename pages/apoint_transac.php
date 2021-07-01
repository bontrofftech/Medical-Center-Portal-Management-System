		
			<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $apointcode = $_POST['apointcode'];
              $clname = $_POST['clname'];
              $gen = $_POST['gender'];
             $phone = $_POST['phonenumber'];
              $appdate = $_POST['appdate'];
              $apptime = $_POST['apptime'];
              $reason = $_POST['reason'];
              $hosy = $_POST['hosy'];
        
              switch($_GET['action']){
                case 'add':     


                    $query2 = "INSERT INTO appointment
                              (CLNAME, APPOINTCODE,GENDER,PHONE_NUMBER,APPDATE,HOSY,APPTIME,REASON)
                              VALUES ('$clname','$apointcode','$gen','$phone','$appdate','$hosy','$apptime','$reason')";
                    mysqli_query($db,$query2)or die ('Error in updating Hospital or Pharmacy in Database');
                break;
              }
            ?>
              <script type="text/javascript">window.location = "myappoint.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>