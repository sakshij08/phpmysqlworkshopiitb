
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




echo "Details of Rohan after updating his marks of subject5 to 99: <br>";

$extract= mysqli_query($conn, "SELECT * FROM class1 WHERE name='Rohan' ");
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

    $newsub5=99;
    $totalobtained =$totalobtained - $sub5 + $newsub5;
    $perc=(float)(($totalobtained/$totalmarks)*100);

    $update = mysqli_query($conn,"UPDATE class1 SET sub5= $newsub5, total_obtained=$totalobtained, percent=$perc  WHERE name='Rohan'");
    
    if (mysqli_query($conn, $update)) {
        echo "Details of Rohan after updating his marks of subject5 to 99: <br>";
      }

    
    echo "Name of Student: ".$name. "<br>";
    echo "Marks in Each Subject:"."<br>";
    echo "Subject 1 : ".$sub1. "<br>";
    echo "Subject 2 : ".$sub2. "<br>";
    echo "Subject 3 : ".$sub3. "<br>";
    echo "Subject 4 : ".$sub4. "<br>";
    echo "Subject 5 : ".$sub5. "<br>";
    echo "Total Marks Obtained: ".$totalobtained."<br>";
    echo "Total Marks: ".$totalmarks."<br>";
    echo "Percentage: ",$perc."% <br> <br>";

}
mysqli_close($conn);
?>