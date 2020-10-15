
<!DOCTYPE html>
<html>
<style>

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
<body>
<?php  
session_start();
session_destroy();
echo "<br>";
?>

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

<div style="padding-left:20px">
	<p style= ' background-color: #B4F8C8; padding:10px'>Successfully logged out</p>
<br>
<a class="clickme" href="index.php" >Login here</a>
</body>
</html>