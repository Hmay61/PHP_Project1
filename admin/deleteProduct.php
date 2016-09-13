<?php
	//get the delete id
	$id = $_GET['id'];
	//echo $id;
	//connect sql
	@mysql_connect('192.168.1.107','root','0601') or die(mysql_error());

	mysql_select_db('data');

	$sql = "delete from products where proID=$id";  
	if(mysql_query($sql)){
		header('location:admin.php');
	}
	else{
		die(mysql_error());
	}

?>