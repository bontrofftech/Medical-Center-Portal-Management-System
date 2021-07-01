<?php
include'../includes/connection.php';
include'../includes/topp.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
			$user=$_SESSION['FIRST_NAME'];
                   
         
}

            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">  
              <h4 class="m-2 font-weight-bold text-primary">My Appointments</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Reference Code</th>
                     <th width="13%">Hospital|Pharmacy</th>
                     <th width="13%">Date /Time</th>
                     <th width="13%">Reason</th>
                     <th width="13%">Status</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php       
     
    $query = "SELECT *,CLNAME
              FROM appointment WHERE `CLNAME`='$user'
               ORDER BY APOINT_ID DESC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['APPOINTCODE'].'</td>';
                            echo '<td>'. $row['HOSY'].'</td>';
                echo '<td>'. $row['APPDATE'].'|'. $row['APPTIME'].'</td>';
				echo '<td>'. $row['REASON'].'</td>';
				echo '<td>'. $row['STATUS'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="tuoneappoints.php?action=edit & id='.$row['APPOINTCODE'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>
