<?php

echo "<table>";
$i = 0;
while($i<10){
    echo '<tr>';
    $j = 0;
    while($j < 10){
        $numero = ($i*10) + $j + 1;
        echo "<td>" . $numero . "</td>";
        $j++;
    }
    echo "</tr>";
    $i++;
}
echo "</table>";

?>



