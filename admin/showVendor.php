<?php
$page ="showSession";
include 'header.php';
if(isset($_GET['gstNo']))
{
	$status=$master->deleteVendor($_GET['gstNo']);
	 // echo $_GET['gstNo'];
	$msg=$status['message'];
	echo "<script type='text/javascript'>alert('$msg');</script>";
	
}
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>show vendor</li>
	</ul>					
</div>

<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">							
			<div class="row">
				<div class="col-xs-12">
					<div class="clearfix"><div class="pull-right tableTools-container"></div></div>
					<h3 class=" header smaller table-header">vendor list</h3>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead><tr>
									<th>serial no</th>
									<th>vendorName</th>								
									<th>company</th>
									<th>address</th>							
									<th>pincode</th>							
									<th>GstNo</th>							
									<th>city</th>
									<th>mobileNo</th>
									<th>created</th>						
								    <th>Action</th>

																
							</tr></thead>

							<tbody>							
							<?php 
							$count=1;
							  $show=$master->showVendor();
							  foreach ($show as $values) {
							  	# code...
							  
							  echo "<tr>
		                      <td>".$count++."</td>

		                      <td>".$values['vendorName']."</td>
		                      <td>".$values['company']."</td>
		                      <td>".$values['address']."</td>
		                      <td>".$values['pincode']."</td>
		                      <td>".$values['GstNo']."</td>
		                      <td>".$values['city']."</td>
		                      <td>".$values['mobileNo']."</td>
		                      <td>".$values['created']."</td>
								";?>
								<td>
									<div class="hidden-sm hidden-xs action-buttons">
											<a class="blue" href="Add_vendor.php?id=<?php echo $values['id'];?>">
												<i class="ace-icon fa fa-search-plus bigger-130"></i>
											</a>
											<a class="red" href="showVendor.php?gstNo=<?php echo $values['GstNo'];?>" onclick="return  confirm('Are you sure to delete !');">
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
