<?php
include'../includes/connection.php';
include'../includes/topp.php';
// session_start();
$product_ids = array();
//session_destroy();

//check if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'addpos')){
    if(isset($_SESSION['pointofsale'])){
        
        //keep track of how mnay products are in the shopping cart
        $count = count($_SESSION['pointofsale']);
        
        //create sequantial array for matching array keys to products id's
        $product_ids = array_column($_SESSION['pointofsale'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['pointofsale'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['pointofsale'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['pointofsale'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['pointofsale'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['pointofsale'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['pointofsale'] = array_values($_SESSION['pointofsale']);
}

//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
                ?>
                <div class="row" >
                <div class="col-lg-12" >
                  <div class="card shadow mb-0" style="height:auto;">
                  <div class="card-header py-2">
                    <h4 class="m-1 text-lg text-primary">DashBoard</h4>
                  </div>

				  <div class="card-header py-1">
                    
                  </div>
				  
                        <!-- /.panel-heading -->
						 <div class="row show-grid">
						<div class="col-md-3">
                        <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">My Transactions</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
						$user=$_SESSION['FIRST_NAME'];
                        $query = "SELECT COUNT(*) FROM transaction WHERE `CUST`='$user'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       </div> 
	   
	   
	  <div class="col-md-3">
                        <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">My Appointments</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                     
                      <?php 
						$user=$_SESSION['FIRST_NAME'];
                        $query1 = "SELECT COUNT(*) FROM appointment WHERE `CLNAME`='$user'";
                        $result1 = mysqli_query($db, $query1) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result1)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       </div>  
	   <div class="col-md-3">
                        <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Approved Ppointments</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM appointment WHERE STATUS='Approved'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       </div>  
	   <div class="col-md-3">
                        <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Appointments</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM appointment WHERE STATUS='Pending Approval'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       </div>  
       </div>  
       </div>  
	   
	   
	   
	   
       </div> 

<?php

include'../includes/footer.php';
?>