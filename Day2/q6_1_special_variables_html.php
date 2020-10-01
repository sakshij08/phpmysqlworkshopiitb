<html>

	<form action='q6_1_special_variables_html.php' method='GET'>
        <h4>Enter the sides of the triangle:</h4>
		Enter side1: <input type='text' name='side1' ><br />
		Enter side2: <input type='text' name='side2' ><br />
		Enter side3: <input type='text' name='side3' ><br /><br/>
		<input type='submit' value='Click here' />
	</form>

</html>

<?php

$sideone = $_GET['side1'];
$sidetwo = $_GET['side2'];
$sidethree = $_GET['side3'];



if ($_GET['side1'] == $_GET['side2'] && $_GET['side2'] && $_GET['side3'] && $_GET['side1'] == $_GET['side3'])
{
	echo "The triangle is an equilateral triangle";
}
elseif($sideone!=$sidetwo && $sidetwo!=$sidethree && $sidethree!= $sideone)
{
    if( $sideone*$sideone + $sidetwo*$sidetwo == $sidethree*$sidethree || $sideone*$sideone + $sidethree*$sidethree == $sidetwo*$sidetwo || $sidetwo*$sidetwo + $sidethree*$sidethree == $sideone*$sideone)
    {
        echo "The triangle is a rightangled triangle ";
    }
    else
    {
        echo"The triangle is a scalene triangle";
    }
}
else
{
	echo "The triangle is an isosceles triangle";
}

?>

