<?php 

$start = microtime(true);

require_once('functions.php');
define('BOARD_SIZE', 8);

$result = array();
for ($i=1; $i <= BOARD_SIZE; $i++) { 
	for ($j=1; $j <= BOARD_SIZE; $j++) { 
		calculateEightQueen(array([$i, $j]), $i+1);
	}
} 

$end = microtime(true);
echo "\nTime taken: " . ($end - $start) . " seconds.\n\n";


?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="styles/main.css"/>
</head>
<body>
<?php



echo "<h1>8 Queens</h1><br />";

echo "<p>There are " . count($result) . " Possibilities.</p>";

for ($board = 0; $board < count($result); $board++) { 

	echo "<br /><h3>Possibility #". ($board + 1) . "</h3><br />";
	echo "<table>";
	for ($i = 1; $i <= BOARD_SIZE; $i++) {
		echo "<tr>";
		for ($j = 1; $j <= BOARD_SIZE; $j++) { 
			if (in_array(array($i, $j), $result[$board])) {
				echo "<td bgcolor=\"#FF0000\">Q</td>";
			} else {
				echo "<td>&nbsp;</td>";
			}
		}
		echo "</tr>";
	}
	echo "</table>";
}
?>
</body>
</html>