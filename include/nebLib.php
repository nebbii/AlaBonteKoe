<?php
/* 	*** Loosely Copyrighted By © 2015 NebSoft ***	*/
//	This big bag of tricks was composed by me
//	rule 1: do not talk about the big bag of tricks
//	rule 2: tell your friends about the big bag of tricks
/*	***			***				***			  ***	*/

function randomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
return $randomString;
}

function debugMode($l) {
	switch($l){
		case 'live':
			ini_set('display_errors', 0);
			ini_set('display_startup_errors', 0);
			error_reporting(0);
		case 'dev':
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			annBox("Debug level set to <u>dev</u>. All debug info, errors and warnings will be shown.");
		break;
	}
}

function annBox($a){
	echo "<h5>".$a."</h5><hr>";
}

function isProxy(){ 
    return (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) ? true : false; 
} 

?>