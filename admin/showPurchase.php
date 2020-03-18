<?php
$page ="showSession";
include 'header.php';
$purchaseId=$_GET['purchaseId'];
if(isset($purchaseId))
{ 
	
	$status=$master->deletePurchase($purchaseId);
	$msg=$status['message'];
	echo "<script type='text/javascript'>alert('$msg');</script>";
	
}
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>show purchase</li>
	</ul>					
</div>

<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">							
			<div class="row">
				<div class="col-xs-12">
					<div class="clearfix"><div class="pull-right tableTools-container"></div></div>
					<h3 class=" header smaller table-header">purchase list</h3>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead><tr>
									<th>serial no</th>

									<th>vendorName</th>
								
									<th>total amount</th>									
									
									<th>created</th>							
									

																
							</tr></thead>

							<tbody>							
							<?php 
							$count=1;
							  $show=$master->showPurchase();
							  foreach ($show as $values) {
							  	# code...
							  
							  echo "<tr>
		                      <td>".$count++."</td>

		                      <td>".$values['vendorName']."</td>
		                      s
		                      <td>".$values['totalAmount']."</td>

		                      <td>".$values['created']."</td>

		                     
								";?>
								<td>
									<div class="hidden-sm hidden-xs action-buttons">
											<a class="blue" href="viewPurchase.php?purchaseId=<?php echo $values['purchaseId'];?>">
												<i class="ace-icon fa fa-search-plus bigger-130"></i>
											</a>
											<a class="green" href="addPurchase.php?purchaseId=<?php echo $values['purchaseId']; ?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

											<a class="red" href="showPurchase.php?purchaseId=<?php echo $values['purchaseId'];?>" onclick="return  confirm('Are you sure to delete !');">
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
