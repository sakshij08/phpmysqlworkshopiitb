<!DOCTYPE html>
<html>
<h3>ENTER YOUR DETAILS</h3><br>
<form action="marks.php" method="POST">

	Full name:<input type="text" name="name" placeholder="Enter your name"><br><br>
	Subject1:<input type="number" name="sub1" placeholder="Marks for subject 1"><br><br>
	Subject2:<input type="number" name="sub2" placeholder="Marks for subject 2"><br><br>
	Subject3:<input type="number" name="sub3" placeholder="Marks for subject 3"><br><br>
	Subject4:<input type="number" name="sub4" placeholder="Marks for subject 4"><br><br>
	Subject5:<input type="number" name="sub5" placeholder="Marks for subject 5"><br><br>

	<input type="submit" value="Submit your marks"><br><br>

</form>
</html>

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname= "result";

$conn = mysqli_connect("localhost","root","","result");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else
echo "Connected successfully <br>";



$name= $_POST['name'];
$sub1 = $_POST['sub1'];
$sub2 = $_POST['sub2'];
$sub3 = $_POST['sub3'];
$sub4 = $_POST['sub4'];
$sub5 = $_POST['sub5'];
$totalobtained = ($sub1+$sub2+$sub3+$sub4+$sub5);
$totalsub=5;
$perc=(float)($totalobtained/$totalsub);


$write = mysqli_query($conn,"INSERT INTO class1 VALUES ('','$name', '$sub1','$sub2','$sub3','$sub4','$sub5','$totalobtained','500','$perc' )");
$extract= mysqli_query($conn, "SELECT * FROM class1 ");
$rows = mysqli_num_rows($extract);

if (mysqli_num_rows($extract) > 0){
while ($rows = mysqli_fetch_assoc($extract)){
    $name=$rows['name'];
    $sub1=$rows['sub1'];
    $sub2=$rows['sub2'];
    $sub3=$rows['sub3'];
    $sub4=$rows['sub4'];
    $sub5=$rows['sub5'];
    $totalobtained=$rows['total_obtained'];
    $totalmarks=$rows['total_marks'];
    $perc=$rows['percent'];


    echo "Name of Student: ".$name. "<br>";
    echo "Marks in Each Subject"."<br>";
    echo "Subject 1 : ".$sub1. "<br>";
    echo "Subject 2 : ".$sub2. "<br>";
    echo "Subject 3 : ".$sub3. "<br>";
    echo "Subject 4 : ".$sub4. "<br>";
    echo "Subject 5 : ".$sub5. "<br>";
    echo "Total Marks Obtained: ".$totalobtained."<br>";
    echo "Total Marks: ".$totalmarks."<br>";
    echo "Percentage: ",$perc."% <br> <br>";
}
}
else
echo "0 results";


$conn->close();
?>