<?php 
session_start(); 
$username=$_SESSION['username'];

if($_SESSION['username']){


$con=mysqli_connect("localhost","root","");

}
else{
	die("you must be logged in! <a href='index.php'>click</a> here to login again<br>");
}
?>
<!DOCTYPE html>
<html>
<style>
	table th, td {
  border: 1px solid black;
  border-collapse: collapse;
  background-color:  #B4F8C8;
}


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
  font-family: Arial, Helvetica, sans-serif;
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

table{
	padding-left:150px;
	padding-right:150px;
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
<body>
	<div class="header">
	<div class="logo">
  		<p> PCE </p>
	</div>
  <h2><a href="#default" >Hello <?php echo "$username";?></a></h2>

  </div>
</div>
	
		<?php
		$con=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($con,"phplogin") or die(mysql_error());
		
		
		$result = mysqli_query($con,"SELECT name,id,mysql,html,php FROM users WHERE username='$username'");
		
		$rows = mysqli_num_rows($result);
		
		while($rows = mysqli_fetch_assoc($result)){
			$id=$rows['id'];
			$name=$rows['name'];
			$mysql=$rows['mysql'];
			$html=$rows['html'];
			$php=$rows['php'];
			$totalmarks=$mysql+$html+$php;
			$per=$totalmarks/300;
			
		#	$totalmarks=$rows['total_marks'];
		#	$total=$rows['total_obtained'];
		#	$perc=$rows['percent'];
			
		}
			

		?>
		<p><h1>YOUR REPORT CARD :</h1></p>
		<div class=form>
		<table style="border: 10px">
						
				<tr>
					<th>PHP</th>
					<th>MySql</th>
					<th>Html</th>
					<th>Total</th>
					<th>Your score</th>
					<th>Percentage</th>
				</tr><br>
				<tr>
					<td style="height:50px;width:100px;text-align:center;" ><?php echo $php; ?></td>
					<td style="height:50px;width:100px;text-align:center;"><?php echo $mysql; ?></td>
					<td style="height:50px;width:100px;text-align:center;"><?php echo $html; ?></td>
					<td style="height:50px;width:100px;text-align:center;"><?php echo 300; ?></td>
					<td style="height:50px;width:100px;text-align:center;"><?php echo $totalmarks; ?></td>
					<td style="height:50px;width:100px;text-align:center;"><?php echo $per*100; ?></td>
				</tr>
			</table>
			<p>

			<input class="clickme" type="button" onclick="window.location.href='changemarks.php';" value="Update Marks" />
			<input class="clickme" type="button" onclick="window.location.href='sendmail.php';" value="Click Here to Mail Your Report Card" />
    </form>
			<?php

			if($totalmarks<120){
			echo '<script>alert("you scored less than 60%, you need to improve")</script>';	
			}
			else if($totalmarks>250){
				echo '<script>alert("excellent, you passed with High Distinction")</script>';
			}
			
			?>
			<p>
			<br> <a class="clickme" href='changepassword.php'>Change Password</a><p><br><a class="clickme" href='logout.php'>logout</a>

</body>
</div>
</html>