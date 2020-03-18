<?php

include "header.php";
$id = "";
if(isset($_GET['id']) ||!empty($_GET['id']))
$id=$_GET['id'];
$buttonText = "Submit";
if($id)
{ 
	global $dataBase;
	$query="SELECT * FROM vendor where vendorId='$id' ";
    $data=mysqli_query($dataBase,$query);
    $result=mysqli_fetch_assoc($data);
    $buttonText = "Update";
}
// echo $id;

?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>Add Vendor</li>
	</ul>					
</div>
	
<div class="page-content">	
	<div class="row">
		<div class="col-md-12">
			  
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> VendorName </label>

					<div class="col-md-8">
						<input type="text" name="vendorName" placeholder="vendorname" value="<?php echo $result['vendorName']?>" required="required" />
					</div>
				</div>

				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> Company </label>

					<div class="col-md-8">
						<input type="text" name="company" placeholder="company" value="<?php echo $result['company']?>" required="required" />
					</div>
				</div>
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> GST NO </label>

					<div class="col-md-8">
						<input type="text" name="gstNo" placeholder="GST NO" value="<?php echo $result['GstNo']?>" required="required" />
					</div>
				</div>
				
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> Mobile No. </label>

					<div class="col-md-8">
						<input type="text" name="mobile" placeholder="Number must be 10 Digit" pattern="[0-9]{10}" value="<?php echo $result['mobileNo']?>" required="required" />
					</div>
				</div>
			<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> City </label>

					<div class="col-md-8">
						<input type="text" name="city" placeholder="city"  value="<?php echo $result['city']?>" required="required" />
					</div>
				</div>
			
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> Pincode </label>

					<div class="col-md-8">
						<input type="text" name="pincode" placeholder="345267"  value="<?php echo $result['pincode']?>" required="required" />
					</div>
				</div>
			
				
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right"> Address </label>
					<div class="col-md-8">
						<textarea class="input_textarea" name="address" placeholder="Address"><?php echo $result['address']?></textarea>
					</div>
				</div>
				
				<div class="form-group">					
					
				</div>				
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<input class="btn btn-info" type="submit" name="submit" value="<?php echo $buttonText; ?>">
					       
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
  <?php
  include "footer.php";
if (isset($_POST['submit'])) 
{
    // $id=$_GET['id'];
	$VendorName=$_POST['vendorName'];
	$company=$_POST['company'];
	$gstNo=$_POST['gstNo'];
	$mobile=$_POST['mobile'];
	$city=$_POST['city'];
	$pincode=$_POST['pincode'];
	$address=$_POST['address'];
	$status=$master->vendorAdd($id,$VendorName,$company,$gstNo,$mobile,$city,$pincode,$address);
	$msg=$status['message'];
	// print_r($status);
        echo "<script type='text/javascript'>alert('$msg');</script>";
// 	 if ($status) {
//         echo "<script type='text/javascript'>alert('row is inserted')</script>";
// 	 }
// 	 else 
// 	 {
// 	 	echo  "<script type='text/javascript'>alert('row is  not inserted')</script>"; 
// 	 }
// 	}
// 	else
// 	{
// 		echo "<script type='text/javascript'>alert('vendor is alredy added')</script>" 	
	 
}
?> 