<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style/common.css">
		<script type="text/javascript">
			function check(){
				var proName = document.getElementById('proName');
				if(proName.value==''){
					alert('please input product name');
					proName.focus();//get focus
					return false;
				}

				var proQuantity = document.getElementById('proQuantity');
				if(proQuantity.value==''||isNaN(proQuantity.value)||proQuantity.value.indexOf('.')!=-1){
					alert('please input an integer number');
					proQuantity.focus();//get focus
					return false;
				}

				var proPrice = document.getElementById('proPrice');
				if(proPrice.value==''|| isNaN(proPrice.value)){
					alert('please input an number');
					proPrice.select();//choose content
					return false;
				}


			}
		</script>
	</head>

	<body>
		<?php
			if(isset($_POST['add'])){
				//get the post data
				$proName = $_POST['proName'];
				$proQuantity = $_POST['proQuantity'];
				$proPrice = $_POST['proPrice'];
				$proImage =$_POST['proImage'];

				//connect sql
				@mysql_connect('192.168.1.107','root','0601') or die(mysql_error());
				//use database
				mysql_select_db('data');
				//sql insert
				$sql = "insert into products values(null,'$proName','$proQuantity','$proPrice','$proImage')";
				//echo $sql;
				if(mysql_query($sql)){
					//echo 'insert successfully';
					header('location:admin.php');

				}
				else{
					echo 'insert fail';
				}


			}
		?>
		<form name="form1" method="post" action="" onsubmit="return check()">
			<table>
				<tr>
					<td colspan="2" align="center">Add Product</td>
				</tr>
				<tr>
					<td>proName</td>
					<td><input type="text" name="proName" id="proName"></td>
				</tr>
				<tr>
					<td>proQuantity</td>
					<td><input type="text" name="proQuantity" id="proQuantity"></td>
				</tr>
				<tr>
					<td>proPrice</td>
					<td><input type="text" name="proPrice" id="proPrice"></td>
				</tr>
				<tr>
					<td>proImage</td>
					<td><input type="text" name="proImage" id="proImage"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="add" value="add"><input type="button" name="return" value="return" onclick="location.href='admin.php'"></td>
				</tr>
			</table>
		</form>	
	</body>
</html>
