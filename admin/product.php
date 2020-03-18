<?php
include "header.php";
$productId=$_GET['productId'];
$buttonText = "Submit";
if($productId)
{ 
	global $dataBase;
    $buttonText = "Update";
	$query="SELECT productName,quantity,sellingPrice FROM productStock where productId='$productId' ";
    $data=mysqli_query($dataBase,$query);
    $result=mysqli_fetch_assoc($data);
}
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>Add product</li>
	</ul>					
</div>

<div class="page-content">	
	<div class="row">
		<div class="col-md-12">
			  
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				

				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> productName </label>

					<div class="col-md-8">
						<input type="text" name="productName" placeholder="productName" value="<?php echo $result['productName']?>" required="required" />
					</div>
				</div>
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> quantity</label>

					<div class="col-md-8">
						<input type="text" name="quantity" placeholder="quantity" value="<?php echo $result['quantity']?>" required="required" />
					</div>
				</div>
				
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> sellingPrice</label>

					<div class="col-md-8">
						<input type="text" name="sellingPrice" placeholder="sellingPrice" value="<?php echo $result['sellingPrice']?>" required="required" />
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
                     if($productId){
				?>

				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<input class="btn btn-info" type="submit" name="update" value="update">
					     
					</div>
				</div> 
				<?php
			 }
			?>
			</form>
		</div>
	</div>
</div>
  <?php

  include "footer.php";
   if (isset($_POST['Add'])) 
{
	$productName=$_POST['productName'];
	$quantity=$_POST['quantity'];
	$sellingPrice=$_POST['sellingPrice'];
	echo $quantity;
	
	$status=$master->addProduct($productId,$productName,$quantity,$sellingPrice);
	$msg=$status['message'];
    echo "<script type='text/javascript'>alert('$msg');</script>";

}


if (isset($_POST['update'])) 
{
	$productName=$_POST['productName'];
	$quantity=$_POST['quantity'];
	$sellingPrice=$_POST['sellingPrice'];
	$status1=$master->addProduct($productId,$productName,$quantity,$sellingPrice);
	$msg1=$status1['message'];
	// print_r($status);
        echo "<script type='text/javascript'>alert('$msg1');</script>";
    }
  ?>
