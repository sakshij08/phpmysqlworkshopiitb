<!DOCTYPE html>
<html>
<body>

<form action="q2_String_functions.php" method="POST">
	<input type="text" name="input">
    <input type="submit" value="Get result">
</form>

</body>
</html>


<?php  

$string =$_POST['input'];
$strlen=strlen($string);
$strtoarray =  explode(" ",$string);
$stringrev = strrev($string);
$strlower = strtolower($string);
$strupper = strtoupper($string);
$replace = str_replace($string, "eat", $string);

if($string)
{
echo "<br>The total number of characters in the string $string are $strlen <br><br>" ;

echo "String to array=> <br> ";
$num=0;
foreach($strtoarray as $char) {
 echo "a[$num]=$char "."<br>" ;
 $num +=1;
};
echo "<br>";

echo "Reverse of the string entered is $stringrev <br><br>";

echo "The lowercase of the string entered is $strlower <br><br> ";

echo "The uppercase of the string entered is $strupper <br><br> ";

echo "After replacing the original string we get: $replace <br><br>";
}

?>