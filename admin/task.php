<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Bootswatch: Cosmo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-3 bg-info" >
				<div class="form-group">
					<label class="col-md-12">Employee Lists</label>
					<a href="../logout.php">Logout</a>
					<form action="" method="post">
						<input type="hidden" name="assigned_by" value="<?php echo $_SESSION['user_id']?>">
					<div class="col-md-12">
						        <?php
								  include "dbcon.php";
								  $query ="select * from user where role ='employee' order by user_id DESC";
								  $res=mysqli_query($con, $query);
								  $count=mysqli_num_rows($res);
								  while($row=mysqli_fetch_array($res))
								  {	

								?>
						<div class="checkbox">
							
							<label>
								
								<input type="checkbox" name="emp[]"  value="<?php echo $row['user_id'];?>">
								<?php echo $row['name'];?>
							</label>
							
						</div>
					     <?php } ?>

						
					</div>

				</div>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<a href="alltask.php" class="btn btn-info">All Task</a>
					<label class="col-lg-12 control-label">Message</label>
					<div class="col-lg-12">
					<textarea class="form-control" rows="10" name="message" placeholder="Message / Task"></textarea>
				    </div>
					
				</div>
			</div>


		
		</div>	
		<br>
     <button class="btn btn-info">Submit task</button>
	
	</div><!--container end-->	

 </form>
</body>
</html>


<?php
include "dbcon.php";
if(isset($_POST['message']))
{
	 echo$message =$_POST['message'];
	 echo$assigned_by =$_POST['assigned_by'];
	 $emplist =$_POST['emp'];
	 //print_r($emplist);
	 foreach($emplist as $emp){

	 	$query="INSERT INTO task(task,user_id,assigned_by)VALUES('$message','$emp','$assigned_by')";
	 	$res=mysqli_query($con,$query);



	 }

}


?>