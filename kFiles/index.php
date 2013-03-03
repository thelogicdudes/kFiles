<?php

	/* Kevin's Index - aka kindex.php */
			/* v5: Feb-26 2013 */

	define("MY_ROOT", "/var/www/logicdudes.com/");

	require_once MY_ROOT . "lib/secret/define.php";
	require_once MY_ROOT . "lib/kSQL.php";	
	require_once MY_ROOT . "lib/kSession.php";	
	require_once MY_ROOT . "lib/kFunctions.php";	
	require_once MY_ROOT . "lib/kPages.php";
	require_once MY_ROOT . "lib/kMod.php";

	$kSQL = new kSQL();

	if(isset($_POST['action']))
	{
		require_once "lib/kReceiver.php";
		$kReceiver = new kReceiver();
		exit();
	}


	$kSession = new kSession();
	$kPages = new kPages();
?>
