<?php
/**
 * Quicksort - basic sorting alghorithm
 *
 * O(n log n) .. in worst cases O(n^2)
 */
function quicksort(&$arr, $left, $right) {

	// set pivot by divide array to two halfs
	$pivot = $arr[round(($left + $right) / 2)];
	// set limit values for cursors
	$i = $left;
	$j = $right;
	// step all values in range
	do {
		// look for first value in left half that is bigger than pivot value
		while ($arr[$i] < $pivot && $i < $right) $i++;
		// look for first value in right half that is lower than pivot value		
		while ($arr[$j] > $pivot && $j > $left) $j--;
		// if there are really two values
		if ($i <= $j) {
			// and those values are different
			if ($i < $j) {
				// switch them!
				$temp = $arr[$i];
				$arr[$i] = $arr[$j];
				$arr[$j] = $temp;
			}
			// move cursors
			$i++;
			$j--;
		}
		
	} while ($i <= $j);

	// if there is more than one items in next step, call next step recursively 
	if ($left < $j) quicksort($arr, $left, $j);
	if ($i < $right) quicksort($arr, $i, $right);

	return $arr;
}

// demo - try yourself
$pole = array(6,4,8,20,34,12,2);
quicksort($pole, 0, count($pole)-1);
var_dump($pole);
