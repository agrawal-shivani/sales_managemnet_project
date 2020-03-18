<?php
include "header.php";
$purchaseId=$_GET['purchaseId'];
// echo $purchaseId;
$total = 0;
if($purchaseId)
{ 
	global $dataBase;
	$query="SELECT productStock.productId,productStock.productName,purchaseProduct.costPrice,purchaseProduct.quantity FROM productStock,purchaseProduct WHERE purchaseProduct.purchaseId=$purchaseId and purchaseProduct.productId=productStock.productId";
    $data=mysqli_query($dataBase,$query);
    $total=mysqli_num_rows($data);
    $dbProductDetails =  array();
    while ($result=mysqli_fetch_assoc($data))
    {
    	$dbProductDetails[]= array('id'=>$result['productId'],'name'=>$result['productName'],'cost'=>$result['costPrice'],'quantity'=>$result['quantity']);
    }
    // print_r($dbProductDetails);
    $query1="SELECT vendor.vendorName FROM vendor,purchaseOrder WHERE purchaseOrder.purchaseId=$purchaseId and  purchaseOrder.vendorId=vendor.vendorId";
     $data1=mysqli_query($dataBase,$query1);
    while( $result1=mysqli_fetch_assoc($data1))
    {
      $vendorName=$result1['vendorName'];
      // echo $vendorName;
    }

}


?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>Add purchase</li>
	</ul>					
</div>

   <div class="page-content">	
	<div class="row">
		<div class="col-md-12">
			  
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="form-group col-md-4">
						<label class="col-md-4 control-label no-padding-right">vendorName</label>
                           <div class="col-md-8">
                           	<?php
                     	?> 
                          	<div class="col-md-8">
					</div>
					<?php
					 ?>

							<select class="form-control mycontrol" id="form-field-select-1" name="vendorId">
									<option value="0">select vendorName</option>
				                       <?php
				                       $show=$master->getVendorName();

							           foreach ($show as $values)
							           {
							           	$isSelect1 = "";
							           //	foreach ($dbProductDetails as $_dbProductDetails) {
							           	if($values['vendorName']==$vendorName)
							           	 {
							           	 	$isSelect1 = "selected";
							           	 }
							           	?>
							           	<option value="<?php echo $values['vendorId']; ?>"<?php echo $isSelect1; ?>><?php echo $values['vendorName']; ?></option>
							           	<?php
							           }
							           ?>
							</select>
						</div>						
				</div>
				<div class=" col-md-12"></div>
				<div id="purchase">
                <?php
				  $i=0;
				  if($total>0)  //  Edit Existing Purchase
				  {
				  while($i<$total)
				  {
				  	if($i!=0)
				  	{ ?>
                      <div id="allRows<?php echo $i; ?>" class="allRows">
				  <?php	}
					?>

				<div class="form-group col-md-4">
					
						<label class="col-md-4 control-label no-padding-right">productName</label>
                           <div class="col-md-8">

							<select class="form-control mycontrol" name="productId[]">
									<option value="0">select productName</option>
				                       <?php
				                       $show1=$master->getProductName();
							           foreach ($show1 as $value)
							           {
							           	$isSelect = "";
							           //	foreach ($dbProductDetails as $_dbProductDetails) {
							           	if($value['productId']==$dbProductDetails[$i]['id'])
							           	 {
							           	 	$isSelect = "selected";
							           	 }
							           	?>
							           	<option value="<?php echo $value['productId']; ?>" <?php echo $isSelect; ?>><?php echo $value['productName']; ?></option>
							           	<?php
							           }
							           //} //}
							           ?>
									
							</select>
						</div>
												
				</div>
				<?php
	            ?>


				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right">costPrice</label>

					<div class="col-md-8">
						<input type="text" name="costPrice[]" placeholder="costPrice" value="<?php echo $dbProductDetails[$i]['cost']; ?>" required="required" />
					</div>
				</div>
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right">quantity</label>

					<div class="col-md-8">
						<input type="text" name="quantity[]" placeholder="quantity" value="<?php echo $dbProductDetails[$i]['quantity']; ?>" required="required" />
					</div>

<?php if($i!=0)
{ ?>
	<input type="button" class="remove" value="Remove" id="<?php echo $i; ?>" name="Remove">
<?php } ?>
				</div>
					<?php
					if($i!=0)
				  	{ ?>
                      </div>
				  <?php	}
					$i=$i+1;
				}   //  end while with total
				$i--;
			} // end total is greater then 0
			else   // Add New Purchase Section
			{ ?>
             <div class="form-group col-md-4">
					
						<label class="col-md-4 control-label no-padding-right">productName</label>
                           <div class="col-md-8">

							<select class="form-control mycontrol" name="productId[]">
									<option value="0">select productName</option>
				                       <?php
				                       $show1=$master->getProductName();
							           foreach ($show1 as $value)
							           {
							           	?>
							           	<option value="<?php echo $value['productId']; ?>"><?php echo $value['productName']; ?></option>
							           	<?php
							           }
							           ?>
									
							</select>
						</div>
												
				</div>


				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right">costPrice</label>

					<div class="col-md-8">
						<input type="text" name="costPrice[]" placeholder="costPrice" value="<?php echo $costPrice[$i]?>" required="required" />
					</div>
				</div>
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right">quantity</label>

					<div class="col-md-8">
						<input type="text" name="quantity[]" placeholder="quantity" value="<?php echo $quantity[$i]?>" required="required" />
					</div>

				</div>
		<?php	}
				?>
				<div class="add_more_nw" id="add">
                   <input type="button" value="Add More" id="addmore" name="addmore">
                </div>
                <div class="all_Clear" id="allClear">
                   <input type="button" value="All Clear" id="allClear" name="allClear[]">
                </div>
                 

            
				</div>
				
				
				<div class="form-group">					
					
				</div>				
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<input class="btn btn-info" type="submit" name="submit" value="Submit">
					       
					</div>
				  
				</div>
				 <?php
                     if($purchaseId){
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
if (isset($_POST['submit'])) 
{
	$vendorId=$_POST['vendorId'];
	$totalAmount=0;
	// print_r($vendorId);
	$productId=$_POST['productId'];
	// print_r($productId);
	$productName=$_POST['productName'];
	$costPrice=$_POST['costPrice']; 
    $quantity=$_POST['quantity'];
    $length=count($costPrice);
	// foreach ($costPrice as $value) {
	// 	$totalAmount=$totalAmount+$value;
	// // }
	for($i=0;$i<$length;$i++)
	{
		$totalAmount=$totalAmount+($costPrice[$i]*$quantity[$i]);
	}
	$status=$master->addPurchase($purchaseId,$vendorId,$productId,$costPrice,$quantity,$totalAmount);
	$msg=$status['message'];
    echo "<script type='text/javascript'>alert('$msg');</script>";

}

if (isset($_POST['update'])) 
{
	$vendorId=$_POST['vendorId'];
	$productId=$_POST['productId'];
	$productName=$_POST['productName'];
	$costPrice=$_POST['costPrice'];
	$quantity=$_POST['quantity'];
    $length1=count($costPrice);
    for($i=0;$i<$length1;$i++)
	{
		$totalAmount=$totalAmount+($costPrice[$i]*$quantity[$i]);
	}

	
	$status1=$master->addPurchase($purchaseId,$vendorId,$productId,$costPrice,$quantity,$totalAmount);
	$msg1=$status1['message'];
	 echo "<script type='text/javascript'>alert('$msg1');</script>";
    }


?>
<script type="text/javascript">
	var j=<?php echo $i; ?>;
	var str="";
    var productNameList=<?php echo json_encode($show1);?>;
    $.each(productNameList,function(key,val){
    	str+='<option value="'+val.productId+'">'+val.productName+'</option>';
    });
    // alert(str););

    $('#addmore').click(function(){<div class="all_Clear" id="allClear">
                   <input type="button" value="All Clear" id="allClear" name="allClear[]">
                </div>
                 
     	//alert("hi");
      j++;
       $('#purchase').append('<div id="allRows'+j+'" class="allRows"><div class="form-group col-md-4"><label class="col-md-4 control-label no-padding-right">productName</label><div class="col-md-8"><select class="form-control mycontrol" name="productId[]"><option value="0">select productName</option>'+str+'</select></div></div><div class="form-group col-md-4"><label class="col-md-4 control-label no-padding-right">costPrice</label><div class="col-md-8"><input type="text" name="costPrice[]" placeholder="costPrice" value="" required="required" /></div></div><div class="form-group col-md-4"><label class="col-md-4 control-label no-padding-right">quantity</label><div class="col-md-8"><input type="text" name="quantity[]" placeholder="quantity" value="" required="required" /></div><div class="col-md-12"></div><input type="button" class="remove" value="Remove" id="'+j+'" name="Remove"></div></div>');
     });
     $(document).on('click','.remove',function(){

         var button_id=$(this).attr("id");
         // alert(button_id);
          $('#allRows'+button_id+'').remove();
     })
;

    $('#allClear').click(function(){
     	$('.allRows').remove();
     });

</script>

