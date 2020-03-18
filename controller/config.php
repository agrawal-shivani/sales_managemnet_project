<?php
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'admin');
define('DBNAME', 'sales_Management');
// define('baseURL', 'http://localhost/php/sales_Management/');
// define('imagesURL', baseURL.'images/');
// define('unlinkImagesURL', '../images/');

// define('adminURL' , baseURL.'admin/index.php');
// define('superAdminURL' , baseURL.'superadmin/index.php');
// define('accountantURL' , baseURL.'accountant/index.php');

// date_default_timezone_set('Asia/Calcutta');
$dataBase=mysqli_connect(DBHOST,DBUSER,DBPASS) or die("Could not connect database");
mysqli_select_db($dataBase,DBNAME) or die("Could not select database");

mysqli_query('SET character_set_result=utf8');

?>