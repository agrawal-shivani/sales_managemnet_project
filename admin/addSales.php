<?php
include "header.php";
?>


<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>Add sales</li>
	</ul>					
</div>
	
<div class="page-content">	
	<div class="row">
		<div class="col-md-12">
			  
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="page-content">	
	<div class="row">
		<div class="col-md-12">
			  
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
                 	<div class="form-group col-md-4" id="soldProduct0">
					<label class="col-md-4 control-label no-padding-right">mobileNo </label>

					<div class="col-md-8">
						<input type="text" name="mobileNo" placeholder="mobileNo" value="<?php echo $result['costPrice']?>" required="required" />
					</div>
				</div>
				<div id="sales">
                 <div id="allRows">


				 <div class="form-group col-md-4">
					
						<label class="col-md-4 control-label no-padding-right">productName</label>
                           <div class="col-md-8">

							<select class="form-control mycontrol" id="list" onchange="getSelectValue();" name="productId[]">
									<option value="0">select productName</option>
				                       <?php
				                       $show1=$master->getProductName();
							           foreach ($show1 as $value)
							           {
							           	?>
							           	<option value="<?php echo $value['productId']."/".$value['sellingPrice']; ?>"><?php echo $value['productName']; ?></option>
							           	<?php
							           }
							           ?>
									
							</select>
							<script type="text/javascript">
								
								function getSelectValue() {
									selectedValue = document.getElementById("list");
									result = selectedValue.options[selectedValue.selectedIndex].value;
									_amount = result.split("/");
									$('#price').val(_amount[1]);
									//alert(_amount[1]);

								}
							</script>
						</div>
												
				</div>
	
				
				
				<div class="form-group col-md-4" id="soldProduct0">
					<label class="col-md-4 control-label no-padding-right"> quantity</label>

					<div class="col-md-8">
						<input type="text" name="quantity[]" placeholder="quantity" value="<?php echo $result['costPrice']?>" required="required" />
					</div>
				</div>
			
				<div class="col-md-12"></div>
			
			
				<div class="form-group col-md-4">
					<label class="col-md-4 control-label no-padding-right">price</label>

					<div class="col-md-8">
						<input type="text" name="price" id="price" placeholder="price"  value="" required="required" />
					</div>
				</div>
			</div>
				<div class="add_more_nw" id="add">
                   <input type="button" value="Add More" id="addmore" name="addmore">
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
                     if($vendorId){
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
	$mobileNo=$_POST['mobileNo'];
	$customerId=$master->getcustomerId($mobileNo);
	$productId=$_POST['productId'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];
    $length=count($quantity);
    for($i=0;$i<$length;$i++)
	{
		$totalAmount=$totalAmount+($price[$i]*$quantity[$i]);
	}
	 $status=$master->addSales($customerId,$productId,$quantity,$price,$totalAmount);
	$msg=$status['message'];
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
<script type="text/javascript">
	var j=0;
	var str="";
    var productNameList=<?php echo json_encode($show1);?>;
    $.each(productNameList,function(key,val){
    	str+='<option value="'+val.productId+'">'+val.productName+'</option>';
    });
    // alert(str););

    $('#addmore').click(function(){
      j++;
       $('#sales').append('<div id="allRows'+j+'" class="allRows"><div class="form-group col-md-4"><label class="col-md-4 control-label no-padding-right">productName</label><div class="col-md-8"><select class="form-control mycontrol" name="productId[]"><option value="0">select productName</option>'+str+'</select></div></div><div class="form-group col-md-4"><label class="col-md-4 control-label no-padding-right">price</label><div class="col-md-8"><input type="text" name="price[]" placeholder="price" value="" required="required" /></div></div><div class="form-group col-md-4"><label class="col-md-4 control-label no-padding-right">quantity</label><div class="col-md-8"><input type="text" name="quantity[]" placeholder="quantity" value="" required="required" /></div><div class="col-md-12"></div><input type="button" class="remove" value="Remove" id="'+j+'" name="Remove"></div></div>');
     });
     $(document).on('click','.remove',function(){

         var button_id=$(this).attr("id");
         // alert(button_id);
          $('#allRows'+button_id+'').remove();
     })
;

    // $('#allClear').click(function(){
    //  	$('.allRows').remove();
    //  });

</script>

