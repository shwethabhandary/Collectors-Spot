<?php
	session_start();
	ob_start();
	include('conc.php');
	if(empty($_SESSION['email'])){
		header("location:index.php");
	}
	if (isset($_POST['remove']))
	{
		echo"<script>alert('Item has been successfully discarded from the cart');</script>";
		$remid=$_POST['remove'];
		$qcart="delete from cart where itemid='$remid'";
		$run=mysqli_query($con,$qcart);
	}
	if (isset($_POST['CheckOut']))
	{
			echo"<script>alert('Shopping is sucessful');</script>";
		    $e=$_SESSION["email"];
			$sl="SELECT * FROM cart where buyyer='$_SESSION[email]'";
			$rn=$con->query($sl);
			while($ro=$rn->fetch_assoc()){
				$id=$ro["itemid"];
				$q1="delete from cart where itemid='$id'";
				if(mysqli_query($con,$q1))
				{
					$q2="delete from exchangeables where id='$id'";
					mysqli_query($con,$q2);
				}
			}
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
		.table1 {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 85%;
		}

		.td1, .th1 {
		  border: 1px solid #dddddd;
		  text-align: center;
		  padding: 8px;
		}

		.tr1:nth-child(even) {
		  background-color: #dddddd;
		}
		.img1{
			max-width:100%;
			max_height:100%;
			display:block;
			height:90px;
			width:90px;
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
			<?php 
			echo"<li><a href='logout.php'><i class=\"fa fa-angle-double-right\" aria-hidden=\"true\"></i>Logout</a></li>";
			?>
		</div>
	</div>
		<div class="splitr right">
		
		<div style="background:#ECF0F3; width:80%; margin-left:10%;min-height:70%;" align="center"  >
				<center><h2><b><br/>Here's Your cart of happiness!</b></h2></center><br/><br/>
				<table class="table1" >
				  <tr  class="tr1">
					<th class="th1">Item</th>
					<th  class="th1">Item Details</th>
					<th class="th1">Item Price</th>
				  </tr>
				  <?php 
					  $il=1;
					   $e=$_SESSION['email'];
					   $qc="select ex.img,ex.id,ex.category,ex.name,ex.price,ex.year,ex.country from exchangeables ex inner join cart c on ex.id=c.itemid where c.buyyer='$e'";
					   $r=mysqli_query($con,$qc);
					   $num=mysqli_num_rows($r)or die("<tr><td colspan='3'><h3><b><i><center> Your cart is empty :'( </center></i></b></h3></td></tr>");
					   $total=0;
					   if($num>0)
					   {
						   while($rows=mysqli_fetch_assoc($r))
						   {
								   echo"<div class='row' >";
								   echo"<div class='column'>";
								   echo"<div class='card '>";
								   echo"<div class='landscape '>";
								   echo"<tr class='tr1'><td class='td1'>";
								   echo"<img class='img1' src=".$rows["img"]." class='hover-shadow cursor'>";
								   echo"</td><td style='margin-left:30%;'>";
								   echo"<br/><h4>CATEGORY: ".$rows["category"]."<br/>ID: ".$rows["id"]."<br/>NAME: ".$rows["name"]."<br/>COUNTRY: ".$rows["country"]."<br/></h4>";
								   echo"<form action='' method='POST'>
										<button  type='submit' style='color:darkblue;' value='".$rows['id']."' name='remove' >Remove from cart</button><br/></td><td class='td1'>";
								   echo"<h4> ₹ ".$rows["price"]."/-</h4></td></tr>";
								   $total=$total+$rows["price"];
								   echo"</div></div></div></div>";
						   }
						   echo"<tr><td></td><td align='center'></br><b>Total amount=</b></td><td class='td1'><br/> ₹ ".$total."/-</td></tr>
						        <tr><td></td><td></td><td>
								<form action='' method='POST'>
									<button  type='submit' style='color:white;background-color:black;' name='CheckOut' >Check Out</button><br/></form></td><td class='td1'>";
					   }
					?>
				</table>
				<br/><br/>
		</div>		
	
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