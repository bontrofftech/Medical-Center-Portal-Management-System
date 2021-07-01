<!-- SIDE PART NA SUMMARY -->
        <div class="card-body col-md-3">
        <?php   
        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);
                  $lessvat = ($total / 1.12) * 0.12;
                  $netvat = ($total / 1.12);
                  $addvat = ($total / 1.12) * 0.12;

             endforeach;
$userr=$_SESSION['FIRST_NAME'];
$sql = "SELECT EMPLOYEE_ID, FIRST_NAME
        FROM customer1
        WHERE FIRST_NAME='$userr'";
$res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

$opt = "<select class='form-control'  style='border-radius: 0px;' name='customer' required>
        ";
  while ($row = mysqli_fetch_assoc($res)) {
    $opt .= "<option value='".$row['EMPLOYEE_ID']."'>".$row['FIRST_NAME']."</option>";
  }
$opt .= "</select>";

$sql1 = "SELECT EMPLOYEE_ID, FIRST_NAME
        FROM customer1
        WHERE FIRST_NAME='$userr'";
$res1 = mysqli_query($db, $sql) or die ("Error SQL: $sql");

$opt1 = "<select class='form-control'  style='border-radius: 0px;' name='customer1' required>
        ";
  while ($row = mysqli_fetch_assoc($res1)) {
    $opt1 .= "<option value='".$row['FIRST_NAME']."'>".$row['FIRST_NAME']."</option>";
  }
$opt1 .= "</select>";
// END OF DROP DOWN
        ?>  
<?php 
          echo "Today's date is : "; 
          $today = date("Y-m-d H:i a"); 
          echo $today; 
?> 
          <input type="hidden" name="date" value="<?php echo $today; ?>">
<div class="form-group row text-left mb-3">
            <div class="col-sm-12 text-primary btn-group">
<?php echo $opt; ?>
<?php echo $opt1; ?>

            </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Subtotal
              </h6>
            </div>
            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($total, 2); ?>" readonly name="subtotal">
              </div>
            </div>

          </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Less VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                 
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($lessvat, 2); ?>" readonly name="lessvat">
              </div>
            </div>

          </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Net of VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                 
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($netvat, 2); ?>" readonly name="netvat">
              </div>
            </div>

          </div> 
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Add VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                 
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($addvat, 2); ?>" readonly name="addvat">
              </div>
            </div>

          </div>
          <div class="form-group row text-left mb-2">

            <div class="col-sm-5 text-primary">
              <h6 class="font-weight-bold py-2">
                Total
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                 
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($total, 2); ?>" readonly name="total">
              </div>
            </div>

          </div>
<?php endif; ?>       
          <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#posMODAL">SUBMIT</button>

        <!-- Modal -->
        <div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">SUMMARY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group row text-left mb-2">

                    <div class="col-sm-12 text-center">
                      <h3 class="py-0">
                        GRAND TOTAL
                      </h3>
                      <h3 class="font-weight-bold py-3 bg-light">
                        <?php echo number_format($total, 2); ?>
                      </h3>
                    </div>

                  </div>

                    <div class="col-sm-12 mb-2">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          
                        </div>
                          <input class="form-control text-right" id="txtNumber" onkeypress="return isNumberKey(event)" type="text" name="cash" placeholder="ENTER CASH" name="cash" required>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">PROCEED TO PAYMENT</button>
              </div>
            </div>
          </div>
        </div>
        <!-- END OF Modal -->

        </form>
      </div> <!-- END OF CARD BODY -->

     </div>

