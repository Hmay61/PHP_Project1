<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style/common.css">
		<script type="text/javascript">
			function jump(id){
				if(confirm('Do you want to delete it?')){
					location.href = 'deleteProduct.php?id='+id;
				}
			}
		</script>

	</head>

	<body>
		<?php
			//connect sql
			@mysql_connect('192.168.1.107','root','0601') or die(mysql_error());
			//chose database
			mysql_select_db('data');
			//query products
			// $sql ="SELECT * FROM `products`";
			// $rs = mysql_query($sql);

			//paging part get the total number
			$sql1 = "SELECT COUNT(*) FROM `products`"; 
			$rs1 = mysql_query($sql1);
			$rows = mysql_fetch_row($rs1); //

			$recordCount = $rows[0]; //total number
			//echo $recordCount;
			//paging part  get the total page size
			$pageSize=5;
			$pageCount = ceil($recordCount/$pageSize);
			//paging part, get the current page number
			$pageNo = isset($_GET['pageNo'])?$_GET['pageNo']:1;
			if($pageNo<1){
				$pageNo=1;
			}
			if($pageNo>$pageCount){
				$pageNo=$pageCount;
			}
			//echo $pageNo;
			//get the start page number
			$startNo = ($pageNo-1)*$pageSize;
			//get the content of the start page 
			$sql ="SELECT * FROM `products` limit $startNo,$pageSize";
			$rs = mysql_query($sql);
		?>
		<a href="addProduct.php">add product</a>
		<table>
			<tr>
				<th>proID</th>
				<th>proName</th>
				<th>proQuantity</th>
				<th>proPrice</th>
				<th>proImage</th>
				<th>update</th>
				<th>delete</th>
			</tr>

			<?php
				while($rows=mysql_fetch_assoc($rs)){
					echo '<tr>';
					echo '<td>'.$rows['proID'].'</td>';
					echo '<td>'.$rows['proName'].'</td>';
					echo '<td>'.$rows['proQuantity'].'</td>';
					echo '<td>'.$rows['proPrice'].'</td>';
					echo $rows['proImage']==''?'<td>no picture</td>':'<td><img src="../'.$rows['proImage'].'"></td>';
					echo '<td><input type="button" value="update" onclick="location.href=\'updateProduct.php?id='.$rows['proID'].'\'"></td>';
					echo '<td><input type="button" value="delete" onclick="jump('.$rows['proID'].')"></td>';
					echo '</tr>';
				}		
			?>
		</table>
		
		<table>
			<tr>
				<td>
					[<a href="?pageNo=1">first</a>]
					[<a href="?pageNo=<?php echo $pageNo-1?>">previous</a>]
					[<a href="?pageNo=<?php echo $pageNo+1?>">next</a>]
					[<a href="?pageNo=<?php echo $pageCount?>">last</a>]
				</td>
			
				<td>		
					<?php
						for($i=1;$i<=$pageCount;$i++){
							echo '<a href="?pageNo='.$i.'">'.$i.'</a>&nbsp;';
						}
					?>	
				</td>
			</tr>
		</table>	
	</body>
</html>
