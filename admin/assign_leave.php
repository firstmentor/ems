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
					<label class="col-md-12">Assign Live</label>
					<a href="../logout.php">Logout</a>
					<form action="" method="post">
						<input type="hidden" name="assign_by" value="<?php echo $_SESSION['user_id']?>">
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
				<a href="alltask.php" class="btn btn-info">All Leave</a>
					<br>
					<br>
				<div class="form-group">

					<label class="col-lg-3 control-label">Valid From:</label>
					<div class="col-lg-9">
					<input type="date" name="validfrm" placeholder="dd/mm/yyyy" class="form-control">
				    </div>
					
				</div>

				<div class="form-group">

					<label class="col-lg-3 control-label">Valid To:</label>
					<div class="col-lg-9">
					<input type="date" name="validto" placeholder="dd/mm/yyyy" class="form-control">
				    </div>
					
				</div>

				<div class="form-group">

					<label class="col-lg-3 control-label">Earning Leave:</label>
					<div class="col-lg-9">
					<input type="text" name="eleave" placeholder="No. of Leave" class="form-control">
				    </div>
					
				</div>

				<div class="form-group">

					<label class="col-lg-3 control-label">Medical Leave:</label>
					<div class="col-lg-9">
					<input type="text" name="mleave" placeholder="No. of Leave" class="form-control">
				    </div>
					
				</div>

				<div class="form-group">

					<label class="col-lg-3 control-label">Casual Leave:</label>
					<div class="col-lg-9">
					<input type="text" name="cleave" placeholder="No. of Leave" class="form-control">
				    </div>
					
				</div>
			</div>


		
		</div>	
		<br>
     <button class="btn btn-info " name="leave">Submit Leave</button>
	
	</div><!--container end-->	

 </form>
</body>
</html>


<?php
include "dbcon.php";
if(isset($_POST['leave']))
{
	 echo$validfrm =$_POST['validfrm'];
	 echo$validto =$_POST['validto'];
	 $eleave =$_POST['eleave'];
	  $mleave =$_POST['mleave'];
	   $cleave =$_POST['cleave'];
	    $assign_by =$_POST['assign_by'];
	    $emplist =$_POST['emp'];
	 //print_r($emplist);
	 foreach($emplist as $emp){

	 	$query="INSERT INTO assign_leave(v_from,v_to,e_leave,m_leave,c_leave,assign_by,assign_to)VALUES('$validfrm','$validto',' $eleave','$mleave','$cleave','$assign_by',' $emp')";
	 	$res=mysqli_query($con,$query);



	 }

}


?>