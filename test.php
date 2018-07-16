<?php
function test($n) {
	if ($n > 0) {
		echo $n, ",";
		test($n - 1);
		echo $n, ",";
	}
	
}
test(10); //10,9,8,7,6,5,4,3,2,1,1,2,3,4,5,6,7,8,9,10
