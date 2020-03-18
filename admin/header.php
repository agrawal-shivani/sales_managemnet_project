<?php
session_start();
include "../controller/master.php";
$master = new master();
// header('location:../login.php');
if(empty($_SESSION['usrnme']) || empty($_SESSION['psswrd']))
{
	header('location:../login.php');
}
else if(!$master->logIn($_SESSION['usrnme'],$_SESSION['psswrd']))
{
	session_unset();
	header('location:../login.php');

}
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
			<meta charset="utf-8" />
			<title>sales_management</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
			<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
			<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
			<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
			<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
			<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
			<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
			<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
			<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
			<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
			<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
			<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />			
			<link rel="stylesheet" href="assets/css/style.css" />
			<style type="text/css">
				/*.page-content
				{
					padding: 8px 20px 1px!important;
				}
				.form-actions
				{
				padding:10px 0px !important;
				}*/
			</style>			
		</head>
		<body class="no-skin">
			<div id="navbar" class="navbar navbar-default ace-save-state">
				<div class="navbar-container ace-save-state" id="navbar-container">
					<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
						<span class="sr-only">Toggle sidebar</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="navbar-header pull-left">
						<a href="index.html" class="navbar-brand">
							<small><i class="fa fa-leaf"></i>sales Management</small>
						</a>
					</div>
					<div class="navbar-buttons navbar-header pull-right" role="navigation">
						<ul class="nav ace-nav">
						      <li class="light-blue dropdown-modal">
								<a data-toggle="dropdown" href="#" class="dropdown-toggle">
									<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
									<span class="user-info"><small>Welcome,</small>Admin</span>
									<i class="ace-icon fa fa-caret-down"></i>
								</a>
								<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
									<li>
										<a href="school.php"><i class="ace-icon fa fa-cog"></i>Settings</a>
									</li>
									<!-- <li>
										<a href="profile.html"><i class="ace-icon fa fa-user"></i>Profile</a>
									</li> -->
									<li class="divider"></li>
									<li>
										 <a href="logout.php"><i class="ace-icon fa fa-power-off"></i>Logout</a> 
										

                                <!-- <a href="logout.php"><i class="ace-icon fa fa-power-off"></i>Logout</a> -->
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
				<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				
					<ul class="nav nav-list">
						<li class="<?php if($page=='index'){echo 'active';}?>">
							<a href="index.php">
								<i class="menu-icon fa fa-tachometer"></i>
								<span class="menu-text"> Dashboard </span>
							</a>
							<b class="arrow"></b>
						</li>
				
						
						<li class="<?php if($page=='session'){echo 'active';}?>">
							<a href="#" class="dropdown-toggle">
								<i class="menu-icon fa fa-list"></i>
								<span class="menu-text"> Vendor </span>
								<b class="arrow fa fa-angle-down"></b>
							</a>
							
						<b class="arrow"></b>
							<ul class="submenu">
								<li class="<?php if($page=='showSession'){echo 'active';}?>">
									<a href="Add_vendor.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Add Vendor
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						<b class="arrow"></b>
							<ul class="submenu">
								<li class="<?php if($page=='showSession'){echo 'active';}?>">
									<a href="showVendor.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Show Vendor
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
							
						</li>
						<li class="<?php if($page=='session'){echo 'active';}?>">
							<a href="#" class="dropdown-toggle">
								<i class="menu-icon fa fa-list"></i>
								<span class="menu-text"> product </span>
								<b class="arrow fa fa-angle-down"></b>
							</a>
							
						<b class="arrow"></b>
							<ul class="submenu">
								<li class="<?php if($page=='showSession'){echo 'active';}?>">
									<a href="product.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Add product
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						<b class="arrow"></b>
							<ul class="submenu">
								<li class="<?php if($page=='showSession'){echo 'active';}?>">
									<a href="showProduct.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Show product
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						</li>
						<li class="<?php if($page=='session'){echo 'active';}?>">
							<a href="#" class="dropdown-toggle">
								<i class="menu-icon fa fa-list"></i>
								<span class="menu-text"> purchase </span>
								<b class="arrow fa fa-angle-down"></b>
							</a>
							
						<b class="arrow"></b>
							<ul class="submenu">
								<li class="<?php if($page=='showSession'){echo 'active';}?>">
									<a href="addPurchase.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Add purchase
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						<b class="arrow"></b>
							<ul class="submenu">
								<li class="<?php if($page=='showSession'){echo 'active';}?>">
									<a href="showPurchase.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Show purchase
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						</li>	
						<li class="<?php if($page=='session'){echo 'active';}?>">
							<a href="#" class="dropdown-toggle">
								<i class="menu-icon fa fa-list"></i>
								<span class="menu-text"> sales</span>
								<b class="arrow fa fa-angle-down"></b>
							</a>
							
						<b class="arrow"></b>
							<ul class="submenu">
								<li class="<?php if($page=='showSession'){echo 'active';}?>">
									<a href="addSales.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Add sales
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
						<b class="arrow"></b>
							<ul class="submenu">
								<li class="<?php if($page=='showSession'){echo 'active';}?>">
									<a href="showSales.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Show sales
									</a>
									<b class="arrow"></b>
								</li>
							</ul>
							
						</li>						
											
												
						
						
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content"> 
				<div class="main-content-inner">


 


 





























































































































































					