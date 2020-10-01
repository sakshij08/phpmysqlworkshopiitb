<!DOCTYPE html>
<html>
<h3>ENTER YOUR DETAILS</h3><br>
<form action="q6_2_special_variables_html.php" method="POST">
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

$name= $_POST['name'];
$sub1 = $_POST['sub1'];
$sub2 = $_POST['sub2'];
$sub3 = $_POST['sub3'];
$sub4 = $_POST['sub4'];
$sub5 = $_POST['sub5'];
$totalsub=5;
$total=(float)(($sub1+$sub2+$sub5+$sub4+$sub3)/$totalsub);

if($sub1||$sub2||$sub3||$sub3||$sub4||$sub5||$name){
echo "Name of Student: ".$name. "<br>";
echo "Marks in Each Subject"."<br>";
echo "Subject 1 : ".$sub1. "<br>";
echo "Subject 2 : ".$sub2. "<br>";
echo "Subject 3 : ".$sub3. "<br>";
echo "Subject 4 : ".$sub4. "<br>";
echo "Subject 5 : ".$sub5. "<br>";
echo "Total Marks Obtained: ".($sub1+$sub2+$sub5+$sub4+$sub3)."<br>";
echo "Total Marks: 500"."<br>";
echo "Percentage: ",$total."%";
}

?>