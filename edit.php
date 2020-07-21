<?php
					include('conc.php');
			      if(isset($_POST['editimg']))
					{
						$ide=$_POST['ide'];
						$hobbye=$_POST['hobbye'];
						$namee=$_POST['namee'];
						$yeare=$_POST['yeare'];
						$pricee=$_POST['pricee'];
						$countrye=$_POST['countrye'];
						$equery="update exchangeables set category='$hobbye',name='$namee',year=$yeare,price=$pricee,country='$countrye' where id=$ide";
						$rune=mysqli_query($con,$equery) or die(mysqli_error($con));
						header("location:add.php");
						//echo "<script>alert('item has been successfully updated.');</script>";
					}
?>