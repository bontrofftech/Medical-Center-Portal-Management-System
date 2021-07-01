<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $name = $_POST['companyname'];
              $prov = $_POST['province'];
              $cit = $_POST['city'];
              $phone = $_POST['phonenumber'];
              $email = $_POST['email'];
              $category = $_POST['category'];
              $ambuphone = $_POST['ambuphone'];
              $ambureg = $_POST['ambureg'];
        
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO location
                              (LOCATION_ID, PROVINCE, CITY)
                              VALUES (Null,'{$prov}','{$cit}')";
                    mysqli_query($db,$query)or die ('Error in updating location in Database');

                    $query2 = "INSERT INTO hosy
                              (SUPPLIER_ID, COMPANY_NAME, LOCATION_ID, PHONE_NUMBER,EMAIL,CATEGORY,AMBU_PHONE,AMBU_REG)
                              VALUES (Null,'{$name}',(SELECT MAX(LOCATION_ID) FROM location),'".$phone."','".$email."','".$category."','".$ambuphone."','".$ambureg."')";
                    mysqli_query($db,$query2)or die ('Error in updating Hospital or Pharmacy in Database');
                break;
              }
            ?>
              <script type="text/javascript">window.location = "hospital.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>