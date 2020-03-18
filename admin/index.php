<?php
$page="index";
include "header.php"; 
?>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	<ul class="breadcrumb">
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
      <li>Dashboard</li>
    </ul>					
</div>
<div class="page-content">
	<div class="row">
		<div class="col-xs-12">								
			<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-check green"></i>
				Welcome to <strong class="green"> admin panel </strong>,
			</div>
			
			<div class="hr hr32 hr-dotted"></div>		
		</div>
	</div>
</div>


<?php 
	include "footer.php"; 
?>