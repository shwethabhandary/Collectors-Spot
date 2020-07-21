<?php
include('conc.php');
if(isset($_POST['id']))
	{
					   $q1="delete from exchangeables where id=".$_POST['id']."";
					   $re=mysqli_query($con,$q1);
					   echo "<script>alert('item has been successfully deleted.');</script>";
	}
	?>