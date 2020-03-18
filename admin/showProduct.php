<?php
$page ="showSession";
include 'header.php';
if(isset($_GET['productNo']))
{ 
	
	$status=$master->deleteProduct($_GET['productNo']);
	 // echo $_GET['gstNo'];
	$msg=$status['message'];
	echo "<script type='text/javascript'>alert('$msg');</script>";
	
}
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>show product</li>
	</ul>					
</div>

<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">							
			<div class="row">
				<div class="col-xs-12">
					<div class="clearfix"><div class="pull-right tableTools-container"></div></div>
					<h3 class=" header smaller table-header">product list</h3>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead><tr>
									<th>serial No</th>

									<th>productId</th>
									<th>productName</th>								
									<th>quantity</th>
									<th>sellingPrice</th>						
									

																
							</tr></thead>

							<tbody>							
							<?php 
							$count=1;
							  $show=$master->showProduct();
							  foreach ($show as $values){
							  
							  echo "<tr>
		                      <td>".$count++."</td>

		                      <td>".$values['productId']."</td>
		                      <td>".$values['productName']."</td>
		                      <td>".$values['quantity']."</td>
		                      <td>".$values['sellingPrice']."</td>
		                     
								";?>
								<td>
									<div class="hidden-sm hidden-xs action-buttons">
											<a class="blue" href="product.php?productId=<?php echo $values['productId'];?>">
												<i class="ace-icon fa fa-search-plus bigger-130"></i>
											</a>
											<a class="red" href="showPurchase.php?productNo=<?php echo $values['productId'];?>" onclick="return  confirm('Are you sure to delete !');">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>
									</div>
								</td>
							</tr>
								<?php
								}		
							?>	
								
							</tbody>
						</table>
					</div>  
				</div>
			</div>		
		</div>
	</div>
</div>


<?php 
include 'footer.php';
?>