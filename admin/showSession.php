<?php
$page ="showSession";
include 'header.php';
?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
	  <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
	  <li>Show All Session</li>
	</ul>					
</div>

<div class="main-content">
	<div class="main-content-inner">
		<div class="page-content">							
			<div class="row">
				<div class="col-xs-12">
					<div class="clearfix"><div class="pull-right tableTools-container"></div></div>
					<h3 class=" header smaller table-header">Session List</h3>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead><tr>
									<th>Serial No.</th>
									<th>Session Year</th>								
									<th>Session Start Date</th>							
									<th>Action</th>
							</tr></thead>

							<tbody>							
							<?php 
								global $id;
								$temp=1;
								$show = 0;
								$getMaster1 = $master->getSession($id,$show); 
		                        if($getMaster1['status'])
		                        {
		                        foreach ($getMaster1['sessionList'] as $getMaster){	
	                        ?>
								<tr>
									<td><?php echo $temp; ?></td>
									<td><?php echo $getMaster['sessionName']; ?></td>					
									<td><?php echo $getMaster['startDate']; ?></td>		
									<td>
										<div class="hidden-sm hidden-xs action-buttons">
											<a class="blue" href="showClass.php?id=<?php echo $getMaster['id'];?>">
												<i class="ace-icon fa fa-search-plus bigger-130"></i>
											</a>
									</div>
								</td>		
								</tr>
								<?php  
								$temp++;
										}
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
