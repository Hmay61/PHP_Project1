<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style/common.css">
		<script type="text/javascript">
		</script>
	</head>

	<body>
		<?php
			$id = $_GET['id'];  
			//echo $id;
			//connect sql
			@mysql_connect('192.168.1.107','root','0601') or die(mysql_error());
			//choose database
			mysql_select_db('data');

			//use sql to get the data;
			$sql = "select * from products where proID=$id"; 
			$rs = mysql_query($sql);
			$rows = mysql_fetch_assoc($rs); 

			//update
			if(isset($_POST['add'])){
				//get the post data
				$proName = $_POST['proName'];
				$proQuantity = $_POST['proQuantity'];
				$proPrice = $_POST['proPrice'];
				$proImage =$_POST['proImage'];

				//put the data into sql
				$sql ="update products set proName='$proName',proQuantity='$proQuantity',proPrice='$proPrice',proImage='$proImage' where proID='$id'";
				//echo $sql;
				if(mysql_query($sql)){
					echo 'success';
				}
				else{
					echo 'fail';
				}
			}
		?>
		<form name="form1" method="post" action="" onsubmit="return check()">
			<table>
				<tr>
					<td colspan="2" align="center">Update Product</td>
				</tr>
				<tr>
					<td>proName</td>
					<td><input type="text" name="proName" id="proName" value="<?php echo $rows['proName']?>"></td>
				</tr>
				<tr>
					<td>proQuantity</td>
					<td><input type="text" name="proQuantity" id="proQuantity" value="<?php echo $rows['proQuantity']?>"></td>
				</tr>
				<tr>
					<td>proPrice</td>
					<td><input type="text" name="proPrice" id="proPrice" value="<?php echo $rows['proPrice']?>"></td>
				</tr>
				<tr>
					<td>proImage</td>
					<td><input type="text" name="proImage" id="proImage" value="<?php echo $rows['proImage']?>"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="add" value="update"><input type="button" name="return" value="return" onclick="location.href='admin.php'"></td>
				</tr>
			</table>
		</form>	
	</body>
</html>
