<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  
?>
  
<?php
           
}
  $query = 'SELECT * FROM appointment WHERE APPOINTCODE ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz= $row['APPOINTCODE'];
      $i= $row['CLNAME'];
      $iii=$row['PHONE_NUMBER'];
      $a=$row['APPDATE'];
      $b=$row['APPTIME'];
      $c=$row['HOSY'];
      $d=$row['REASON'];
      $f=$row['STATUS'];
	   $r=$row['REMARKS'];
    }
      $id = $_GET['id'];
?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Appointment Details</h4>
            </div>
            <a href="viewappoint.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
          

                
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Client Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $i; ?>  <br>
                        </h5>
                      </div>
                    </div>
					

					<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Apointment Code<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          :<?php echo $zz; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Hospital|Pharmacy<br>
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
                          Phone<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $iii; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Booked Date<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $a; ?>  Time :<?php echo $b; ?><br>
                        </h5>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Reason <br>
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
                         Status<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                           <?php echo $f; ?> <br>
                        </h5>
                      </div>
                    </div>
<div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Remarks <br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $r; ?> <br>
                        </h5>
                      </div>
                    </div>
                      </div>
                    </div>

          </div>
          </div>

<?php
include'../includes/footer.php';
?>