<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/common.css">
	</head>

	<body>
		<?php
			$link = @mysql_connect('192.168.1.107','root','0601') or die(mysql_error());
			mysql_select_db('data');
			$sql ="SELECT * FROM `products`";

			$rs = mysql_query($sql);
	
		?>
		<table>
			<tr>
				<th>proID</th>
				<th>proName</th>
				<th>proQuantity</th>
				<th>proPrice</th>
				<th>proImage</th>
			</tr>

			<?php
				while($rows=mysql_fetch_assoc($rs)){
					echo '<tr>';
					echo '<td>'.$rows['proID'].'</td>';
					echo '<td>'.$rows['proName'].'</td>';
					echo '<td>'.$rows['proQuantity'].'</td>';
					echo '<td>'.$rows['proPrice'].'</td>';
					echo $rows['proImage']==''?'<td>no picture</td>':'<td><img src="'.$rows['proImage'].'"></td>';
					echo '</tr>';
				}		
			?>

		</table>
	</body>
</html>
