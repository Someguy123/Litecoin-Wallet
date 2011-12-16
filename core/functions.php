<?
function returntimer ($pagetimer) {
	/*$intertime = timer() - $timer;
	//if ($_SERVER['REQUEST_TIME']) $intertime = timer() - $_SERVER['REQUEST_TIME'];
	$lol = substr($intertime, 2, 3);
	if ($lol[0] == 0 && $lol[1] == 0) $lol = $lol[2];
	elseif ($lol[0] == 0) $lol = $lol[1].$lol[2];

	$intertime = ($intertime >= 1 ? substr($intertime, 0, 5)." sec" : $lol."ms");
	return $intertime;*/

	$timer = round(timer()-$pagetimer,3);
	return ($timer[0] == 0 ? round(substr($timer,2))." ms" : $timer."  sec");

}

function timer () {
	$a = explode (' ',microtime());
	return(double) $a[0] + $a[1];
}
?>