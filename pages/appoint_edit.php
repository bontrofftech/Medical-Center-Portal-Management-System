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

// JOB SELECT OPTION TAB
$sql = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='jobs' required>
        <option value='' disabled selected>Select Role</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
  }

$opt .= "</select>";

        $query = 'SELECT * FROM appointment WHERE APPOINTCODE ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
          while($row = mysqli_fetch_array($result))
          {   
            $zz = $row['APPOINTCODE'];
            $fname = $row['CLNAME'];
            $lname = $row['GENDER'];
            $email = $row['APPDATE'];
            $phone = $row['PHONE_NUMBER'];
            $jobb = $row['HOSY'];
            $hdate = $row['APPTIME'];
            $prov = $row['REASON'];
            $cit = $row['STATUS'];
          }
            $id = $_GET['id'];
      ?>
  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Update Appointment</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="viewappoint.php"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
          
            <form role="form" method="post" action="appoint_edit1.php">
              <input type="hidden" name="id"  readonly value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                Client Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="First Name" readonly name="firstname" value="<?php echo $fname; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 GENDER:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Last Name" name="lastname" readonly value="<?php echo $lname; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Date:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Email" name="email" readonly value="<?php echo $email; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact #:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Phone Number" name="phone"  readonly value="<?php echo $phone; ?>" required>
                </div>
              </div>
              
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Time:
                </div>
                <div class="col-sm-9">
                  <input placeholder="Hired Date" type="text" id="FromDate" readonly name="hireddate" value="<?php echo $hdate; ?>" class="form-control" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Reasons:
                </div>
                <div class="col-sm-9">
                  <textarea class="form-control" placeholder="Province" readonly name="province" value="<?php echo $prov; ?>" required><?php echo $prov; ?></textarea>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Status:
                </div>
                <div class="col-sm-9">
                  <select class="form-control" placeholder="City / Municipality" name="city"  required>
				  <option value="<?php echo $cit; ?>"><?php echo $cit; ?></option>
				  <option value="Pending Approval">Pending Approval</option>
				  <option value="Approved">Approved</option>
				  </select>
                </div>
              </div>
<div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Remarks:
                </div>
                <div class="col-sm-9">
                  <textarea class="form-control" placeholder="Remarks" name="remarks"  required></textarea>
                </div>
              </div>


              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
                    
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>