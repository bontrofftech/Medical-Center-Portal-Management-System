<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Hospital's Detail</h4>
            </div>
            <a href="hospital.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">
          <?php 
            $query = 'SELECT SUPPLIER_ID, COMPANY_NAME, l.PROVINCE, l.CITY, PHONE_NUMBER,EMAIL,CATEGORY,AMBU_PHONE,AMBU_REG FROM hosy e join location l on e.LOCATION_ID = l.LOCATION_ID WHERE e.SUPPLIER_ID ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['SUPPLIER_ID'];
                $a= $row['COMPANY_NAME'];
                $b=$row['PROVINCE'];
                $c=$row['CITY'];
                $d=$row['PHONE_NUMBER'];
                $d1=$row['EMAIL'];
                $d11=$row['CATEGORY'];
                $d111=$row['AMBU_PHONE'];
                $d1111=$row['AMBU_REG'];
              }
              $id = $_GET['id'];
          ?>
                
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Hospital |Pharmacy Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $a; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          County<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $b; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Sub County<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $c; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Phone Number<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $d; ?> <br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Email Address<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $d1; ?> <br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Category<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $d11; ?> <br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Ambulance Details<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          :Phone: <?php echo $d111; ?>, Registration Number:<?php echo $d1111; ?><br>
                        </h5>
                      </div>
                    </div>
          </div>
          </div>

<?php
include'../includes/footer.php';
?>