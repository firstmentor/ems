<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="../logout.php">Logout</a>
	<table>
		<tr>
			<th>Sr N0.</th>
			<th>Task</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		<?php
		
		// echo$_SESSION['user_id'];
		include "dbcon.php";
		$i=1;
		$q="select * from task where user_id ='".$_SESSION['user_id']."'";
		$query = mysqli_query($con, $q);
       

       while ($result = mysqli_fetch_array($query)) {



		?>


		<tr>
		   <td><?php echo $i++; ?></td>
		   <td>	<a href="view_message.php?id=<?php echo $result['t_id'];?>">V<?php echo substr($result['task'],0,50);?></a></td>
		   <td><?php echo $result['data_time'];?></td>
		   <td>
		   	<a href="view_message.php?id=<?php echo $result['t_id'];?>">View</a>
		</tr> 

		<?php
		}
		?>  	

	</table>

</body>
</html>