<?php

$matrice1 = array
(
"row1"=>array("1","2"),
"row2"=>array("1","2")
);

$matrice2 = array
(
"row1"=>array("1","2"),
"row2"=>array("1","2")
);

echo $matrice1['row1'][0] + $matrice2['row1'][0] . "  "; 
echo $matrice1['row1'][1] + $matrice2['row1'][1] . "<br>"; 
echo $matrice1['row2'][0] + $matrice2['row2'][0] . "  "; 
echo $matrice1['row2'][1] + $matrice2['row2'][1] . "<br>"; 

?>