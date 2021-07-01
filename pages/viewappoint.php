<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                         
           
}   
            ?>
            
            <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Appointments</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>Client Name</th>
                          <th>Reference NUMBER</th>
                          <th>Hospital|Pharmacy</th>
                          <th>PHONE</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                    <?php                  
                        $query = 'SELECT * FROM appointment';
                        $result = mysqli_query($db, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['CLNAME'].'</td>';
                        echo '<td>'. $row['APPOINTCODE'].'</td>';
                        echo '<td>'. $row['HOSY'].'</td>';
                        echo '<td>'. $row['PHONE_NUMBER'].'</td>';
                        echo '<td>'. $row['STATUS'].'</td>';

                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="tuoneappoint.php?action=edit & id='.$row['APPOINTCODE'] . '"><i class="fas fa-fw fa-list-alt"></i> View</a>
                            <div class="btn-group">
                             
                           
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="appoint_edit.php?action=edit & id='.$row['APPOINTCODE']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                               
                            
                            </div>
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