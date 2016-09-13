<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/common.css">
	</head>

	<body>
		<?php
			//click the button
			if(isset($_POST['button'])){
				//get the username and pwd
				$username = $_POST['username'];
				$pwd = $_POST['pwd'];

				//connect sql
				@mysql_connect('192.168.1.107','root','0601') or die(mysql_error());
				mysql_select_db('data');
				mysql_query('set names utf8');//设置客户端字符编码

				$sql = "SELECT * FROM `user` WHERE username='".$username."' and `password`='".$pwd."'";
				//echo $sql;
				$rs = mysql_query($sql);
				
				if(mysql_num_rows($rs)==1){
					//echo 'success';
					//success,go the the showProduct page
					header('location:showProduct.php');
				}
				else{
					echo 'fail';
				}
			}
		?>
		<form name="form1" method="post" action="">
			<table>
				<tr>
					<td colspan="2" align="center">Login</td>
				</tr>
				<tr>
					<td>username:</td>
					<td><input type="text" name="username" value=""></td>
				</tr>
				<tr>
					<td>password:</td>
					<td><input type="password" name="pwd" value=""></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="submit" name="button"></td>
				</tr>

			</table>
		</form>
	</body>
</html>