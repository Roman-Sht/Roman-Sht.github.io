<?php
function getDiagonalLocs($loc) {
	$diagonal_locs = array();

	list($w, $h) = $loc;
	while ($w != BOARD_SIZE && $h != BOARD_SIZE) {
		$diagonal_locs[] = [++$w, ++$h];
	}

	list($w, $h) = $loc;
	while ($w != 1 && $h != 1) {
		$diagonal_locs[] = [--$w, --$h];
	}

	list($w, $h) = $loc;
	while ($w != BOARD_SIZE && $h != 1) {
		$diagonal_locs[] = [++$w, --$h];
	}

	list($w, $h) = $loc;
	while ($w != 1 && $h != BOARD_SIZE) {
		$diagonal_locs[] = [--$w, ++$h];
	}

	return $diagonal_locs;
}

function isAllowedlocation($locations, $new_queen) {
	foreach ($locations as $location) {
		if ($location[0] == $new_queen[0] || $location[1] == $new_queen[1]) {
			return false;
		} elseif (in_array($new_queen, getDiagonalLocs($location))) {
			return false;
		} 
	}
	return true;
}

function calculateEightQueen($locations, $line) {
	global $result;
	if (count($locations) == 8) {
		$result[] = $locations;
		unset($locations);
		return;
	}

	for ($i = $line; $i <= BOARD_SIZE; $i++) { 
		for ($j = 1; $j <= BOARD_SIZE; $j++) { 
			$new_loc = array($i, $j);
			if (!in_array($new_loc, $locations) && isAllowedlocation($locations, $new_loc)) {
				calculateEightQueen(array_merge($locations,[$new_loc]), $i+1);
			}
		}
	}
}



?>