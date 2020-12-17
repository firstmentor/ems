<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
   if(isset($_SESSION['success']))
   {
     echo $_SESSION['success'];
     unset( $_SESSION['success']);
   }

   if(isset($_SESSION['error']))
   {
     echo $_SESSION['error'];
     unset( $_SESSION['error']);
   }

  ?>
<form action="" method="post">
	<input type="text" name="email" placeholder="email"><br><br>
	<input type="text" name="password" placeholder="password"><br><br>
	<input type="submit" name="login" value="Login"/>
	</form>
</body>
</html>




<?php
include ('dbcon.php');
if (isset($_POST['login']))
{
	 echo$email = $_POST['email']; 
	 echo$pwd =  $_POST['password']; 

 $query = "SELECT * FROM  user WHERE email = '$email' && password= '$pwd'";
   $data = mysqli_query($con, $query);

   $total =mysqli_num_rows($data);
   $row=mysqli_fetch_array($data);
	 //echo $total; 
    
  if($total==1)
  { 

  	$role =$row['role'];
  	if($role=='admin')
  	{ 
      $_SESSION['user_id'] =$row['user_id'];
  		header('location:admin/dashboard.php');
  	}elseif ($role=='employee') {
      $_SESSION['user_id'] =$row['user_id'];
  		header('location:employee/dashboard.php');
  	}else{
  		$_SESSION['error'] ="Wrong Email or Password";
		 header('location:login.php');
  	}	
    
      
   //     // $_SESSION['success'] ="Redirected to Dashboard";
   }
    else{

		 $_SESSION['error'] ="Wrong Email or Password";
		 header('location:login.php');
	}

}