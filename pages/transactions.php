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
              <h4 class="m-2 font-weight-bold text-primary">Transactions</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th  >Transaction Number</th>
                     <th>Amount</th>
                     <th >Number of Items</th>
                     <th >Action</th>
                   </tr>
               </thead>
          <tbody>

<?php       
     
    $query = "SELECT *,NUMOFITEMS,CUST
              FROM transaction WHERE `CUST`='$user'
               ORDER BY TRANS_D_ID ASC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'. $row['GRANDTOTAL'].'</td>';
                echo '<td>'. $row['NUMOFITEMS'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="transs_view.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
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
