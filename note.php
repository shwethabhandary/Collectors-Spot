<?php
	session_start();
	ob_start();
	include('conc.php');
	if(empty($_SESSION['email'])){
		header("location:index.php");
	}
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
			.splitl {
			height: 100%;
			width: 19%;
			position: fixed;
			z-index: 1;
			top: 0;
			overflow-x: hidden;
			padding-top: 20px;
			}
			.splitr {
			height: 100%;
			width: 81%;
			position: fixed;
			z-index: 1;
			top: 0;
			overflow-x: hidden;
			padding-top: 20px;
			}
			.left {
			left: 0;
			top:60px;
			background-color: #111;
			}
			.right {
            right: 0;
			top:60px;
			}
			.sidenav {
		  height: 100%;
		  width: 18%;
		  position: fixed;
		  z-index: 1;
		  top: 60px;
		  left: 0;
		  background-color: #111;
		  overflow-x: hidden;
		  padding-top: 20px;
		}
		.sidenav a {
		  padding: 6px 8px 6px 16px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #FFF;
		  display: block;
		}
		.sidenav a:hover {
		  color: #f1f1f1;
		}
		.main {
		  margin-left: 160px; /* Same as the width of the sidenav */
		  font-size: 28px; /* Increased text to enable scrolling */
		  padding: 0px 10px;
		}
		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
			/* The popup form - hidden by default */
			.form-popup {
			  width:370px;
			  height:440px;
			  display: none;
			  position: fixed;
			  top: 40%;
			  left: 50%;
			  bottom: 0;
			  right: 15px;
			  transform: translate(-50%, -50%);
			 border: 3px solid #EFEFEF;
			  z-index: 9;
			  background: #EBF5FB;
			}
			/* Full-width input fields */
			.form-container input[type=text], .form-container input[type=password] {
			  width: 55%;
			  height:12%
			  padding: 15px;
			  margin: 5px 0 22px 0;
			  border: none;
			  background: #FFFFFF;
			}}
			/* Set a style for the add button */
			.form-container .btn {
			  background-color: #4CAF50;
			  color: white;
			  padding: 16px 20px;
			  border: none;
			  cursor: pointer;
			  width: 100%;
			  margin-bottom:10px;
			  opacity: 0.8;
			}
			/* Add a red background color to the cancel button */
			.form-container .cancel {
			  background-color: red;
			  margin-left:11%;
			}
			/* Add some hover effects to buttons */
			.form-container .btn:hover, .open-button:hover {
			  opacity: 0.7;
			}
			.img1{
				max-width:100%;
				max_height:100%;
				display:block;
				height:200px;
				width:250px;
			}
			.card {
			  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			  transition: 0.3s;
			  width: 4%;
			  border-radius: 5px;
			}

			.card:hover {
			  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
			}


			.container {
			  padding: 2px 16px;
			}

</style>
<title>Collectors Spot online</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div style="height:60px;background-color:#000000;align:center;">
      <img src="logo.jpg"height="50px"width="300px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
	<div class="splitl left">
		<div class="sidenav">
		    <a href="cart.php">Cart</a><br/>
			<a href="coin.php">Coins</a><br/>
			<a href="note.php">Notes</a><br/>
			<a href="stamp.php">Stamps</a><br/>
			<a href="add.php">Exchange</a>
			
			<li><a href='logout.php'><i class=\"fa fa-angle-double-right\" aria-hidden=\"true\"></i>Logout</a></li>

		</div>
	</div>
		<div class="splitr right">
				<br/><center><h1><b>Hey! You can add these Paper currency to your collection</b></h2></center><br/>
				<?php 

				   $e=$_SESSION['email'];
				   $q="select * from exchangeables where pid!='$e' and category='note'";
				   $res=mysqli_query($con,$q);
				   $er=mysqli_error($con);
				   echo "<h1>".$er."</h1>";
				   $num=mysqli_num_rows($res);
				   if($num>0)
				   {
					   echo"<table  align='center' >";
					   while($rows=mysqli_fetch_assoc($res))
					   {
							   echo"<div class='row' style='margin-left:5%'>";
							   echo"<div class='column'>";
							   echo"<div class='card '>";
							   echo"<div class='landscape '>";
							   echo"<tr><td>";
							   echo"<img class='img1' src=".$rows["img"]." class='hover-shadow cursor'>";
							   echo"</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>";
							   echo"<h4>ID: ".$rows["id"]."<br/>NAME: ".$rows["name"]."<br/>COUNTRY: ".$rows["country"]."<br/>PRICE: ₹ ".$rows["price"]."<br/></h4>";
							   echo"<form action='' method='POST'>
							        <button  type='submit' style='color:black;' value='".$rows['id']."' name='addcart' >Add to cart</button></td></tr>";
							   echo"<div class='container'>";
							   echo"</div></div></div></div></div>";
					   }
					   echo"</table>";
				   }
				 ?>  
				 <?php
					if (isset($_POST['addcart']))
						{
							echo"<script>alert('Note has been successfully added to your cart');</script>";
							$addid=$_POST['addcart'];
							$user=$_SESSION['email'];
							$qcart="INSERT INTO cart VALUES('$user','$addid')";
							$run=mysqli_query($con,$qcart);
						}
				 ?>
	             <div style="background-color:#000000; height:120px; font-color:#ffffff;margin-top:10px;">
						  <table align="center">
						  <tr>
							  <td>
								 <h4><a href="index.php">Home</h4>
								 <ul>
								 <li><a href="index.php">Log Out</li>
								 <li><a href="index.php">Connectivity</li>
								 <li><a href="index.php">About us</li>
								 </ul>
							  </td>
							  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <td>
								 <h4><a href="#about">My Exchangeables</h4>
								 <ul>
								 <li><a href="coin.php">Coin</li>
								 <li><a href="note.php">Notes</li>
								 <li><a href="stamp.php">Stamp</li>
								 </ul>
							  </td>
						   </tr>
						   </table><br/><br/><br/>
		          </div>
		</div>
</body>