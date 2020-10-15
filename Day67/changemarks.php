

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
    <a href="registration.php">Register</a>
    <a href="#about">About</a>
  </div>
</div>

<body>
	<form action="changemarks.php" method="POST">
		<table>
			<tr>
				<td>Marks in php:</td>
				<td>
					<input type="number" name="marksphp" >
				</td>
			</tr>
			<tr>
				<td>Marks in mysql:</td>
				<td>
					<input type="number" name="marksmysql" >
				</td>
			</tr>
			<tr>
				<td>Marks in html:</td>
				<td>
					<input type="number" name="markshtml" >
				</td>
			</tr>
			
		</table>
		<input class="clickme" type="submit" name="submit" value="Update marks">
		</form>
		<p>
			<br> <a class="clickme" href='report.php'>GO back to report view</a><br>
</body>
</html>

<?php  
session_start(); 
$username=$_SESSION['username'];
$submit=$_POST['submit'];
$marksphp=$_POST['marksphp'];
$marksmysql=$_POST['marksmysql'];
$markshtml=$_POST['markshtml'];

if(isset($_POST['submit'])){
	$con=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($con,"phplogin") or die(mysql_error());
	$result = mysqli_query($con,"SELECT name,id,mysql,html,php FROM users WHERE username='$username'");

    $rows = mysqli_num_rows($result);
    while($rows = mysqli_fetch_assoc($result)){
			
			
			$mysql=$rows['mysql'];
			$html=$rows['html'];
			$php=$rows['php'];
			$totalmarks=$mysql+$html+$php;
			$per=$totalmarks/300;

				
		}

	if($marksmysql>100||$marksphp>100||$markshtml>100){
			echo "marks are out of 100, please enter valid marks";
		}else
{
		 $update = "UPDATE users SET php='$marksphp', mysql='$marksmysql',html='$markshtml'  WHERE username='$username'";
		 
		 echo "<br>RECORDS UPDATED";
        if ($con->query($update) === TRUE) {
            
        }
         else 
        {
            echo "Error updating record: " . $con->error;
        }
        }
		

}

?>
