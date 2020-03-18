<?php
include "header.php";
echo "hfhhjv";
?>
<div class="page-content">	
	<div class="row">
		<div class="col-md-12">
			  
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				

				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> productName </label>

					<div class="col-md-8">
						<input type="text" name="productName" placeholder="productName" value="<?php echo $result['productNo']?>" required="required" />
					</div>
				</div>
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> quantity</label>

					<div class="col-md-8">
						<input type="text" name="quantity" placeholder="quantity" value="<?php echo $result['productName']?>" required="required" />
					</div>
				</div>
				
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> sellingPrice</label>

					<div class="col-md-8">
						<input type="text" name="sellingPrice" placeholder="sellingPrice" value="<?php echo $result['costPrice']?>" required="required" />
					</div>
				</div>
			
				<div class="form-group">					
					
				</div>				
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<input class="btn btn-info" type="submit" name="Add" value="Add">
					       
					</div>
				  </div>
				

				 <?php
                     if($id){
				?>

				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<input class="btn btn-info" type="submit" name="update" value="update">
					     
					</div>
				</div> 
				<?php
			 // }
			?>
			</form>
		</div>
	</div>
</div>
  <?php

  include "footer.php";
//   if (isset($_POST['Add'])) 
// {
// 	$productName=$_POST['productName'];
// 	$quantity=$_POST['quantity'];
// 	$sellingPrice=$_POST['sellingPrice'];
// 	echo $quantity;
	
// 	$status=$master->addProduct($productName,$quantity,$sellingPrice);
// 	$msg=$status['message'];
//     echo "<script type='text/javascript'>alert('$msg');</script>";

// // }
  ?>
