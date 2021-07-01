<?php
include'../includes/connection.php';
include'../includes/topp.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
   
?>

<?php
             
}
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Medical Product's Details and Contact Address</h4>
            </div>
            
            <div class="card-body">
          <?php 
            $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME,BYUSER,DESCRIPTION, COUNT(`QTY_STOCK`) AS "QTY_STOCK", COUNT(`ON_HAND`) AS "ON_HAND",PRICE, c.CNAME FROM product p join medcategory c on p.CATEGORY_ID=c.CATEGORY_ID WHERE PRODUCT_CODE ='.$_GET['id'];
			
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['PRODUCT_ID'];
                $zzz= $row['PRODUCT_CODE'];
                $i= $row['NAME'];
                $by= $row['BYUSER'];
                $a=$row['DESCRIPTION'];
                $c=$row['PRICE'];
                $d=$row['CNAME'];
              }
              $id = $_GET['id'];
          ?>
          <?php 
            $query1 = 'SELECT *,COMPANY_NAME,PHONE_NUMBER,EMAIL, CATEGORY,j.LOCATION_ID FROM hosy l join product f on l.SUPPLIER_ID=f.SUPPLIER_ID join location j on l.LOCATION_ID=j.LOCATION_ID WHERE f.PRODUCT_CODE ='.$_GET['id'];
            $result1 = mysqli_query($db, $query1) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result1))
              {   
                $zz1= $row['COMPANY_NAME'];
                $zzz1= $row['PHONE_NUMBER'];
                $i1= $row['EMAIL'];
                $by1= $row['CATEGORY'];
                $a1=$row['PROVINCE'];
                $c1=$row['CITY'];
                $c11=$row['AMBU_PHONE'];
                $c12=$row['AMBU_REG'];
                              }
              $id = $_GET['id'];
          ?>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Code<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $zzz; ?><br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $i; ?> <br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Added By<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $by; ?> <br>
                        </h5>
                      </div>
                    </div>
                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Description<br>
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
                          Price<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $c; ?><br>
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
                          : <?php echo $d; ?><br>
                        </h5>
                      </div>
                    </div>
					<hr></hr>
					<div style="float:right;">
              <h5 class="m-2 font-weight-bold text-danger">Book Appointment&nbsp;<a  href="#" data-toggle="modal" data-target="#appointmentModal" type="button" class="btn btn-danger bg-gradient-danger" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h5>
            </div>
					
					<h4 class="m-2 font-weight-bold text-primary">Contact Information</h4>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Hospital|Pharmacy Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $zz1; ?><br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Mobile<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $zzz1; ?> <a href="tel:<?php echo $zzz1; ?>" class="btn btn-success" > Call Help Desk Now</a><br>
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
                          : <?php echo $i1; ?><br>
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
                          :Mobile: <?php echo $c11; ?>, Registration Number: <?php echo $c12; ?> <a href="tel:<?php echo $c11; ?>" class="btn btn-success" > Call us now</a><br>
                        </h5>
                      </div>
                    </div>
					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Type<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $by1; ?><br>
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
                          : <?php echo $a1; ?>, <?php echo $c1; ?><br>
                        </h5>
                      </div>
                    </div>
                </div>
          </div></center>

          


<?php
include'../includes/footer.php';
?>