<!DOCTYPE html>
<html>
<body>
<form action="q1_md5.php" method="POST">
	<input type="text" name="username" placeholder="USERNAME"><br>
	<input type="password" name="password" placeholder="PASSWORD"><br>
	<input type="submit"  name="submit" value="Save the details">

</form>
</body>
</html>


<?php  
$host="localhost";
$user="root";
$password="";
$db="data1";

$conn = mysqli_connect("localhost","root","","data1");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else
echo "Connected successfully <br>";

$username=$_POST['username'];
$userpassword=$_POST['password'];
$userpasswordenc=md5($userpassword);

if (isset($_POST['submit'])) {
$write = mysqli_query($conn,"INSERT INTO detail VALUES('','$username','$userpasswordenc')");

$extract = mysqli_query($conn,"SELECT * FROM detail ");
$rows = mysqli_num_rows($extract);
while($rows = mysqli_fetch_assoc($extract)){
$user=$rows['username'];
$encpass=$rows['password'];
echo "Username: $user and Encrypted password: $encpass <br>";

}
}
mysqli_close($conn);
?>