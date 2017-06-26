<?php
/*
//---------------------------------------------------------
get_yen
yen * 1.3 = all_yen
all_yen / 500 = buy_user
buy_user / 5 * 100 = active_user


condition:
70% get benefit
5% buy_user
//---------------------------------------------------------
*/


$get_yen = 300000;

$dat = calc_dat($get_yen);
foreach($dat as $key => $value){
	print $key. "\t : ". $value. "\n";
}


function calc_dat($get_yen){
	$get_yen = 300000;
	$all_yen = $get_yen * 1.3;
	$buy_user = $all_yen / 500;
	$active_user = ($buy_user / 5) * 100;

	$dat["get_yen "] = $get_yen;
	$dat["all_yen "] = $all_yen; 
	$dat["buy_user"] = $buy_user;
	$dat["active_user"] = $active_user;

	return $dat;
}


/*
$get_yen = 300000;
$all_yen = $get_yen * 1.3;
$buy_user = $all_yen / 500;
$active_user = ($buy_user / 5) * 100;

$end = "\n";
print $get_yen;
print $end;
print $all_yen;
print $end;
print $buy_user;
print $end;
print $active_user;
print $end;
*/

?>
