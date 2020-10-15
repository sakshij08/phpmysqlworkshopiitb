<?php 
session_start();
$username=$_POST['username'];
$password = $_POST['password'];
$servername = "localhost";
$user = "root";
$pass = "";

if($username&&$password){
$con=mysqli_connect($servername,$user,$pass) or die("could'nt connect");
if($con) {
 
    
  $db=mysqli_select_db($con,"phplogin") or die(mysql_error());;
  
$query = mysqli_query($con,"SELECT *FROM users ORDER BY id asc");
$rows = mysqli_num_rows($query);
if($rows>0){
	while ($rows = mysqli_fetch_assoc($query)) {
		$dbusername=$rows['username'];
		$dbpassword=$rows['password'];

	}
	if($dbusername&&$dbpassword){
	if($username==$dbusername&&$password==$dbpassword){

		echo "<h3 style= 'text-align:center; background-color: #B4F8C8; padding:10px'>You logged in successfully<br>You are in! <a href='report.php'>Click here</a> to view your report card</h3>";
		$_SESSION['username']=$dbusername;

	}
	else{
		echo "<h3 style= 'text-align:center; background-color: #B4F8C8; padding:10px'>Wrong credentials! <br> <br><a href='index.php'>Go back to Login again</h3></a>";
	}
}
else{
	echo "<h3 style= 'text-align:center; background-color: #B4F8C8; padding:10px'>Please <a href='registration.php'>register</a> yourself before logging in <br></h3>";
}
}

}
else {
  echo '<h1>MySQL Server is not connected</h1>';
}
}
else{
	die("<h3 style= 'text-align:center; background-color: #B4F8C8; padding:10px'>Please enter your username and password <br><a href='index.php'>Return</a></h3>");
}

?>