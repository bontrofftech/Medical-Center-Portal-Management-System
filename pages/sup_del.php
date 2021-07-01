<?php
include'../includes/connection.php';

	if (!isset($_GET['id']) || $_GET['id'] != 1) {
						
    	switch ($_GET['id']) {
    		case 'hosy':
    			$query = 'DELETE FROM hosy WHERE SUPPLIER_ID = ' . $_GET['id'];
    			$result = mysqli_query($db, $query) or die(mysqli_error($db));				
            ?>
    			<script type="text/javascript">alert("Hospital Successfully Deleted.");window.location = "hospital.php";</script>					
            <?php
    			//break;
            }
	}
?>