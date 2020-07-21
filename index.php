<!DOCTYPE html>
<html lang="en">
<head>
<style>
.carousel-inner{
	height:500px;

}
.item img{
	position:absolute;
	min-height:220px;
     object-fit:cover;
	 
}

p {
   font-size: 20px;
  text-indent: 30px;
  text-align: justify;
  letter-spacing: 2px;
}
.top-left1 {
  position: absolute;
  top: 8px;
  left: 16px;
  color:white;
  font-family: "Times New Roman", Times, serif;
  font-style: italic;
  font-size: 40px;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* The popup form - hidden by default */
.form-popup {
  width:400px;
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  bottom: 0;
  z-index: 9;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
  width: 25%;
  margin-bottom:10px;
  margin-left:85px;
  opacity: 0.7;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
  margin-left:40px;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity:0.75;
}
</style>
<title>Collectors Spot online</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top"style="height:60px;">
  <div class="container-fluid"style="height:60px; background-color:#000000;">
    <div class="navbar-header" style="height:60px;background-color:#000000;align:center;">
      <img src="logo.jpg"height="50px"width="300px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <ul class="nav navbar-nav" style="align:center;margin-top:-3px">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#about">About us</a></li>
	  <li><a href="#register">Sign-up</a></li>
    </ul>
	   <button class="btn btn-danger navbar-btn" onclick="openForm()" style="height:30px;background-color:#000000;">Login</button>
  </div>
</nav>


<div class="form-popup" id="logForm" style="background-image:url('reg.jpg');background-size:700px;  max-width: 600px; padding: 10px;">
  <form action="" method="POST" class="form-container"><br/>
    <h1 style="color:white;margin-left:167px;">Login</h1>

    &nbsp;&nbsp;&nbsp;&nbsp;<label style="color:white;" for="email"><b>Email</b></label>
    &nbsp;&nbsp;&nbsp;<input type="email" class="form-control" name="email" placeholder="Email" >

    </br><label style="color:white;" for="password"><b>Password</b></label>
    <input type="password" class="form-control" name="password" placeholder="Enter Password">

    <br/><button type="submit" class="btn" name="loginbutton">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	<br/><br/><br/><br/>
  </form>
</div>
<?php
	$con=mysqli_connect("localhost","root","","exchange") or die(mysqli_error());
	session_start();
   if(isset($_POST['loginbutton']))
   {
		 $email=$_POST['email'];
		$password=$_POST['password'];
	    $user_authentication_query="select email,password from user where email='$email' and password='$password'";
		$user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
		$rows_fetched=mysqli_num_rows($user_authentication_result);
		if($rows_fetched==0){
				  				echo("<script> alert('Wrong username or password');</script>");
		}else{
				$_SESSION['email']=$email;
				header("location: add.php");
		};
		
	}
	$con->close();
?>

<script>
function openForm() {
  document.getElementById("logForm").style.display = "block";
}

function closeForm() {
  document.getElementById("logForm").style.display = "none";
}
</script>


<div class="container-fluid" >
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  
    <div class="item active">
      <img src="img4.jpg" alt="coins">
	  <div class="top-left1"><br/><br/>Numismatics&nbsp;&nbsp;<hr/>
	        <h1 style="font-size:18px;font-color:'white';align='justify';">
	        Coins of interest to collectors often include those<br/>that circulated for only a brief time, coins with mint<br/>errors and especially beautiful or historically pieces.<br/> Coin collecting can be differentiated from numismatics
			</h1>
	   </div>
	</div>

    <div class="item">
      <img src="noteimg.jpg" alt="note">
	  <div class="top-left1"><br/><br/>Notaphily&nbsp;<hr/>
			<h1 style="font-size:18px;font-color:'white';align='justify';">
			It is the study and collection of paper currency,<br/>and banknotes. People have been collecting paper<br/> money for as long as it has been in use
			</h1>
	  </div>
    </div>

    <div class="item">
      <img  src="stampimg.jpg" alt="stamp">
	  <div class="top-left1"><br/><br/>Philately&nbsp;<hr/>
			<h1 style="font-size:18px;font-color:'white';align='justify;'">
			Stamp collecting is generally accepted as one of<br/>the areas that make up the wider subject of<br/>philately, which is the study of stamps.
			</h1>
	   </div>
    </div>
	
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>

    <div class="container" align="center">
       <br/><br/><br/><b><h1 style="font-size:40px;font-style: bold;">Connectivity</h1></b><br/>
        <table align="center" style="width:90%;">	  
         <tr>
		   <td>
		       <img src="connectivity.jpg" class="img-circle" alt="connectivity" width="150" height="150">  
			</td>
			<td>&nbsp;&nbsp;&nbsp;</td>
		    <td>
			    <p>Collectors spot has been a global platform which helps to exchange coins , bank currency and stamps from all around the world. Varied currency and stamps from different countries like India , China , Buthan, USA, Tanzania , Thailand etc irresective of continents and countries the numismatists, notaphilist and philatelist are connected for exchange of their hobbies with others  </p>
			</td>
		  </tr>
		</table>
		<br/><br/><br/><b><h1 id="about" style="font-size:40px;font-style:bold;" >About Us</h1></b><br/>
        <table align="center"style="width:90%;">
         <tr>
		    <td>
			    <p>Collectors spot has been a global platform which helps to exchange coins , bank currency and stamps from all around the world. Varied currency and stamps from different countries like India , China , Buthan, USA, Tanzania , Thailand etc irresective of continents and countries the numismatists, notaphilist and philatelist are connected for exchange of their hobbies with others  </p>
			</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
		    <td>
		       <img src="aboutus.jpg" class="img-square" alt="about us" width="150" height="150">
			</td>
		  </tr>
		 </table>
		 <br/><br/><br/>
    </div>
	<div style="background-color:#F9F9F9; height:550px;">
	<br/><h2 id="register" align="center">Wish to be a part of the family?</h2>
	<h4 align="center"><b>Register now</b></h4>
	<table align="center" style="width:90%;">
	 <tr align="center">
	   <td align="center">
		<div style="background-image:url('reg.jpg');background-size:700px ;width:600px ;height:400px;">
			   <form class="form-detail" action="" method="POST" name="myform">
     				<div class="form-group">
					<div class="form-row form-row-1"><br/><br/>
						<label style="color:white;" for="first_name">First Name</label>
						<input type="text" name="first_name" id="first_name" class="input-text">
					</div>
					<br/>
					<div class="form-row form-row-1">
						<label style="color:white;" for="last_name">Last Name</label>
						<input type="text" name="last_name" id="last_name" class="input-text">				
					</div>
				</div>
				<div class="form-row">
					<label style="color:white;"for="your_gender">Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="radio" name="your_gender" value="male"><label style="color:white;"for="your_gender">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="your_gender" value="female"><label style="color:white;"for="your_gender">Female</label>
				</div>
				<div class="form-row">
					<label style="color:white;margin-top:10px;"for="your_email">Email Id &nbsp;&nbsp;&nbsp;</label>
					<input type="text" name="your_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<br/>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label style="color:white;" for="password">Password&nbsp;</label>
						<input type="password" name="password" id="password" class="input-text" required>
					</div>
					<br/>
					<div class="form-row form-row-1">
						<label style="color:white;" for="comfirm-password">Re-type&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="password" name="comfirm_password" id="comfirm_password" class="input-text" required>
					</div>
				</div>
				<div class="form-checkbox">
					  	<input  type="checkbox" name="checkbox" required><a style="color:white;">I hereby, accept all the terms and policies</a>
					  	<span class="checkmark"></span>
					</label>
				</div>
				<br/>
				<div class="form-row-last">
					<input type="submit" name="register" style="color: white;background-color: #4CAF50;cursor: pointer;" class="register" value="Register">
				</div>
				<br/><br/>
			</form>
	</div>
<!-- php for registration -->
<?php
   $con=mysqli_connect("localhost","root","","exchange") or die(mysqli_error());
   if(isset($_POST['register']))
   {
		$fn=$_POST['first_name'];
		$ln=$_POST['last_name'];
		$gen=$_POST['your_gender'];
		$umail=$_POST['your_email'];
		$pas=$_POST['comfirm_password'];
		$query="INSERT INTO user VALUES('$fn','$ln','$gen','$umail','$pas')";
		$run=mysqli_query($con,$query);
		$er=mysqli_error($con);
		echo "<h1>".$er."</h1>";
	}
	$con->close();
?>
<!-- php registration end-->
	</td></tr></table></div>
	<div style="background-color:#000000; height:120px; text-color:'white';margin-top:10px;">
	  <table align="center">
	  <tr>
	      <td>
		     <h4>Home</h4>
			 <ul>
			 <li>SignUp</li>
			 <li>Login</li>
			 <li>About us</li>
			 </ul>
		  </td>
	   </tr>
	   </table>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
		  	debug: true,
		  	success:  function(label){
        		label.attr('id', 'valid');
   		 	},
		});
		$( "#myform" ).validate({
		  	rules: {
			    password: "required",
		    	comfirm_password: {
		      		equalTo: "#password"
		    	}
		  	},
		  	messages: {
		  		first_name: {
		  			required: "Please enter a firstname"
		  		},
		  		last_name: {
		  			required: "Please enter a lastname"
		  		},
		  		your_email: {
		  			required: "Please provide an email"
		  		},
		  		password: {
	  				required: "Please enter a password"
		  		},
		  		comfirm_password: {
		  			required: "Please enter a password",
		      		equalTo: "Wrong Password"
		    	}
		  	}
		});
	</script>
</body>
</html>
