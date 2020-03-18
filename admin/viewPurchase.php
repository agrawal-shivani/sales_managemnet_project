<?php
$page ="showSession";
include 'header.php';
$purchaseId=$_GET['purchaseId'];

?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>view purchase</li>
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
									<th>productName</th>		
									<th>costPrice</th>
		                            <th>quantity</th>
						</tr></thead>

							<tbody>							
							<?php 
							$count=1;
							  $show=$master->viewPurchase($purchaseId);
							  foreach ($show as $values) {
							  	# code...
							  
							  echo "<tr>
		                      <td>".$count++."</td>

		                     
		                     
		                      <td>".$values['productName']."</td>

		                      <td>".$values['costPrice']."</td>
		                      <td>".$values['quantity']."</td>
		                      
</td>
		                      
		                      ";?>
								
							</tr>
								<?php
								}		
							?>
							<td><font color='green'><a href='showPurchase.php'>Back to previous page</a></td>;	
								
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
