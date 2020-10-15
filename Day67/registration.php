<html>
<style >

* {box-sizing: border-box;}

.logo{
  font-family: "Impact", fantasy;
  font-size: 24px;
  float: left;
  color:#fff;
  font-weight: bold;
  padding-left: 25px;
  background:#800000;
  width: 90px;
  border-radius: 10%;
}

h1{
    text-align: center;
    background-color: #B4F8C8;
    padding: 5px;
}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.clickme {
    background-color: #F2C5E0;
    padding: 8px 20px;
    text-decoration:none;
    font-weight:bold;
    border-radius:5px;
    color: #00008B;
    cursor:pointer;
}
.header {
  overflow: hidden;
  background-color:	#C9B1C6;
  padding: 20px 10px;
}

.header a {
  float: left;
  text-align: center;
  line-height: 25px;
  border-radius: 30%;
  margin: 5px;
  color: #f2f2f2;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  background-color: #C9B1C6;
}

.form{
  text-align:center;
  background-color:#C9B1C6;
  padding:20px;
  margin-top: 20px;
  margin-bottom: 100px;
  margin-right: 250px;
  margin-left: 250px;
}
.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: #B4F8C8;
  color: black;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }

}
</style>
</head>
<body>

<div class="header">
  <div class="logo">
  		<p> PCE </p>
  </div>
  <div class="header-right">
    <a href="index.php">Login</a>
    <a class="active" href="registration.php">Register</a>
    <a href="#about">About</a>
  </div>
</div>


<div style="padding-left:20px">

<h1>Enter your details</h1>
<div class=form>

	<form method="POST" action="registration.php">
		
		<table>
			<tr>
				<td>Full name:</td>
				<td>
					<input type="text" name="fullname" >
				</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td>
					<input type="text" name="username" >
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					<input type="password" name="password" >
				</td>
			</tr>
			<tr>
				<td>Confirm password:</td>
				<td>
					<input type="password" name="confirmpassword">
				</td>
			</tr>
			<tr>
				<td>Marks in PHP:</td>
				<td>
					<input type="number" name="marksphp" >
				</td>
			</tr>
			<tr>
				<td>Marks in MySQL:</td>
				<td>
					<input type="number" name="marksmysql" >
				</td>
			</tr>
			
			<tr>
				<td>Marks in HTML:</td>
				<td>
					<input  type="number" name="markshtml" >
				</td>
			</tr>
		</table>
		<p>
			<input class="clickme" type="submit" name="submit" value="Register">
			<input class="clickme" type="button" onclick="window.location.href='index.php';" value="Login here" />
	
		</form>
	
</div>

</html>

<?php  

$submit=$_POST['submit'];
$fullname=$_POST['fullname'];
$username=$_POST['username'];
$password = $_POST['password'];

$confirmpassword = $_POST['confirmpassword'];
$marksphp=$_POST['marksphp'];
$marksmysql=$_POST['marksmysql'];
$markshtml=$_POST['markshtml'];

if(isset($_POST['submit'])){
	$con=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($con,"phplogin") or die(mysql_error());$namecheck=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
	$count= mysqli_num_rows($namecheck);
	if($fullname&&$username&&$password&&$confirmpassword&&$markshtml&&$marksmysql&&$marksphp){
		if($password==$confirmpassword){
			if(strlen($username)>25||strlen($fullname)>25){
				echo "Max limit for username/fullname is 25 characters";
			}
			else{
				if($count!=0){
				echo "username already taken<br>";
				}
				else{
					if($marksmysql>100||$marksphp>100||$markshtml>100){
						echo "marks are out of 100, please enter valid marks";
					}
					else{
						$query = mysqli_query($con,"INSERT into users VALUES('','$fullname','$username','$password','$marksphp','$marksmysql','$markshtml')");
						die("You have been registered successfully!<br> Return to <a href='index.php'>login</a> page");
					}
				}
			}
		}
		else{
			echo "<br>password and repeatpassword doens't match";
		}

	}
	else{
		echo "<br>please enter all required details";
	}
}

?>


