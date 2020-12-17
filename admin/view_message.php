<?php
session_start();


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<h1>Message Detail View</h1>

<?php
include "dbcon.php";
 $m_id=$_GET['id'];
 $query="Select * from task where t_id =$m_id";
 $res=mysqli_query($con,$query);
 $row=mysqli_fetch_array($res);



?>
<div class="col-sm-12" style="background: #f9f9f9;padding: 5px;">
	<?php echo $row['task'];?>
</div>	
<div class="col-sm-2">
	<h3>Reply:</h3>
</div>
<div class="col-sm-10">
<form action="" method="post">
	<input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
	<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
	<textarea name="m_reply" rows="5" style="width: 100%;"></textarea>
	<br>
	<button type="submit" name="submit" class="btn btn-primary">Reply</button>
</form>	
	

</form>	


<?php
include "dbcon.php";
if(isset($_POST['submit']))
{
	$mid =$_POST['m_id'];
	$user_id =$_POST['user_id'];
	 $reply = $_POST['m_reply'];

	$query ="insert into task_reply(reply,m_id,reply_by) values ('$reply','$mid','$user_id')";
	$res=mysqli_query($con,$query);
}






?>

<br>
<div class="form-group">
	<label>
		<h3>Your Reply:</h3>
	</label>
	<div class="col-lg-10">
		<?php
		include "dbcon.php";
		 $m_id=$_GET['id'];
		 $query="Select * from task_reply JOIN user ON user.user_id =task_reply.reply_by where m_id=$m_id";
		 $res1=mysqli_query($con,$query);
		//echo $fire=mysqli_fetch_array($res1);
	    while($row1=mysqli_fetch_array($res1)){
	?>

	<div class="col-lg-12" style="background: #f9f9f9; padding: 15px;">

    <?php echo $row1['name'].':- '.$row1['reply'];?>

	<!-- -->	

	</div>	

	<?php
}
?>
</div>		


