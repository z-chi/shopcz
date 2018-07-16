<?php
//求平方
$arr = array(1,2,3,4,5);
/*
var_dump($arr);
foreach ($arr as $k => $v) {
	$arr[$k] = $v * $v;
}
*/
function pf($num) {
	return $num * $num;
}

$new = array_map('pf',$arr);
var_dump($new);