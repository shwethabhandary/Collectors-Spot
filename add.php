<?php
	session_start();
	ob_start();
	include('conc.php');
	if(!isset($_SESSION['email']))
	{
		header("Location:index.php");
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
				height:190px;
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
		<div style="background:white;">
				<center><h1><b>Welcome  To  Collector's  Exchange Spot</b></h1>
				<br/><input type="button" name="addcoin" value=" " align="center" onclick="openForm()" style="background-image:url('add.jpg');background-size:200px ;width:200px ;height:200px; "></center>
		</div>
		<br/>
		<div style="background:#ECF0F3; width:80%; margin-left:10%;"  >
				<br/><center><h2><b>My Exchangeables</b></h2></center>
				<?php 

				   $e=$_SESSION['email'];
				   $q="select * from exchangeables where pid='$e'";
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
							   echo"</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td><td>";
							   echo"<h4>ID:".$rows["id"]."<br/> CATEGORY: ".$rows["category"]."<br/>NAME: ".$rows["name"]."<br/>COUNTRY: ".$rows["country"]."<br/>PRICE: ₹ ".$rows["price"]."<br/></h4>";
							   echo"<button type='button' style='color:Green;' name='edit' onclick='openEditForm(".$rows['id'].")' >Edit</button>";
							   echo "<button type='button' style='color:red;margin-left:10%;' name='delete' onclick='foo(".$rows['id'].")'  id='d'>Delete</button></td></tr>";
							   echo"<div class='container'>";
							   echo"</div></div></div></div></div>";
					   }
					   echo"</table>";
				   }
				 ?>  
				 <script type="text/javascript">
						function foo (val) {
									$.ajax({
										type: 'POST',
										url: 'del.php',
										data: {id: val},
										success: function(data) {
											alert("Deleted Successfully!");
											window.location.replace("add.php");
										}
									});
						   }
				 </script>
				<div class="form-popup" id="edit" style="max-width: 600px; padding: 10px;">
							<form action="edit.php" class="form-container" align="center"  method="POST">
									<h1 style="color:black;">Edit</h1><br/><br/>
									
									<label style="color:black;margin-left:-62%;" for="hobbye" required><b>Category :</b></label>    
									<select  style="height:6%;width:55%;margin-left:30%;margin-top:-10%;" name="hobbye" class="form-control">
										<option value="coin">Coin</option>
										<option value="stamp">Stamp</option>
										<option value="note">Note</option>
									</select>	<br/>
									<label style="color:black;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID :</b></label>
									<input type="text" align="center" value="" name="ide" id="demo" readonly><br/>
									<label style="color:black;" for="namee"><b>Name :</b></label>
									<input type="text" align="center" placeholder="Re-Enter name" name="namee" required><br/>
									
									<label style="color:black;" for="yeare"><b>&nbsp;&nbsp;&nbsp;Year :</b></label>
									<input type="text" align="center"  placeholder="Re-Enter year of publish" name="yeare" required><br/>
									
									<label style="color:black;" for="pricee"><b>&nbsp;&nbsp;&nbsp;Price :</b></label>
									<input type="text" align="center"   placeholder="Re-Enter price" name="pricee" required><br/>
									
									<input type="hidden" name="id" value=""/>
									
									<label style="color:black;margin-left:-62%;" for="countrye" required><b>Country :</b></label>    
									<select id="countrye" style="height:6%;width:55%;margin-left:30%;margin-top:-10%;" name="countrye" class="form-control">
										<option value=""> </option>
										<option value="India">India</option>
										<option value="China">China</option>
										<option value="SriLanka">Sri Lanka</option>
										<option value="Tanzania">Tanzania</option>
										<option value="Bhutan">Bhutan</option>
										<option value="UnitedKingdom">United Kingdom</option>
									</select>	

								<br/><input type="submit" name="editimg"  class="btn" style="background-color:green;margin-left:16%;">
								<button type="button" class="btn cancel" onclick="closeEForm()">Close</button>
		                     <br/><br/><br/><br/>
							</form>
			   </div>
			    
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

	
	<div class="form-popup" id="add" style="max-width: 600px; padding: 10px;">
	<form action="add.php" class="form-container" align="center" enctype="multipart/form-data" method="POST">
			<h1 style="color:black;">Add</h1><br/>
			
			<label style="color:black;margin-left:-62%;" for="hobby" required><b>Category :</b></label>    
            <select id="countrys" style="height:6%;width:55%;margin-left:30%;margin-top:-10%;" name="hobby" class="form-control">
                <option value="coin">Coin</option>
				<option value="stamp">Stamp</option>
				<option value="note">Note</option>
			</select>	

			&nbsp;<label style="color:black; margin-top:4%;" for="image"><b>Image:</b></label>
			<input type="file" name="image" style="margin-left:45px;" required accept="image/*"><br/>

			<label style="color:black;" for="name"><b>Name :</b></label>
			<input type="text" align="center" placeholder="Enter Stamp name" name="name" required><br/>
			
			<label style="color:black;" for="year"><b>&nbsp;&nbsp;&nbsp;Year :</b></label>
			<input type="text" align="center"  placeholder="Enter year of publish" name="year" required><br/>
			
			<label style="color:black;" for="price"><b>&nbsp;&nbsp;&nbsp;Price :</b></label>
			<input type="text" align="center"  placeholder="Enter price" name="price" required><br/>
			
			<label style="color:black;margin-left:-62%;" for="country" required><b>Country :</b></label>    
            <select id="countrys" style="height:6%;width:55%;margin-left:30%;margin-top:-10%;" name="country" class="form-control">
				<option value=""> </option>
                <option value="India">India</option>
				<option value="China">China</option>
				<option value="SriLanka">Sri Lanka</option>
				<option value="Tanzania">Tanzania</option>
				<option value="Bhutan">Bhutan</option>
				<option value="UnitedKingdom">United Kingdom</option>
			</select>	

		<br/><button type="submit" name="addimg" value="Submit" class="btn" style="background-color:green;margin-left:21%;">&nbsp;Add&nbsp;</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		<br/><br/><br/><br/>
	</form>
   </div>
   <?php
	if(isset($_POST['addimg']))
	{
		$hobby=$_POST['hobby'];
		$name=$_POST['name'];
		$year=$_POST['year'];
		$price=$_POST['price'];
		$country=$_POST['country'];
		$targetDir = "img/";
		$fileName = basename($_FILES["image"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		// add image
		$allowTypes = array('jpg','png','jpeg','gif','pdf');
		if(in_array($fileType, $allowTypes)){
			if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
				$query = "INSERT INTO exchangeables(pid,category,img,name,year,price,country) VALUES ('{$_SESSION['email']}','{$hobby}','{$targetFilePath}','{$name}','{$year}','{$price}','{$country}')";
				mysqli_query($con, $query);
				if(!mysqli_error($con)){
                header("location:add.php?status=success");
            }else{
                header("location:add.php?status=a");
            } 
        }else{
            header("location:add.php?status=b");
        }
    }else{
        header("location:add.php?status=c");
    }
	}
	if(isset($_GET['status'])){
		if($_GET['status']==="success")
		{
			echo "<script>alert('Sucessfull Updated.')</script>";
		}elseif($_GET['status']=="a"){
			echo "<script>alert('File upload failed, please try again.');";
		}
		elseif($_GET['status']=="b")
		{
			echo "<script>alert('Sorry, there was an error uploading your file.')";
		}
		elseif($_GET['status']=="c")
		{
			echo "<script>alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.')";
		}
	}
?>
	<script >
		function openForm() {
		  document.getElementById("add").style.display = "block";
		}
		function openEditForm(val) {
			
		  document.getElementById("edit").style.display = "block";
		  document.getElementById("demo").value=val;
		}

        function closeForm() {
		  document.getElementById("add").style.display = "none";
		}
		
		function closeEForm() {
		  document.getElementById("edit").style.display = "none";
		}
	</script>
</body>