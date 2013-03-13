<?php

	define("MY_ROOT", "/var/www/site.tld/");
	define("LIB_ROOT", "/var/www/comm/kFiles/");

	require_once MY_ROOT . "lib/secret/define.php";
	require_once MY_ROOT . "lib/kPages.php";
	require_once LIB_ROOT . "lib/kSQL.php";	
	require_once LIB_ROOT . "lib/kSession.php";	
	require_once LIB_ROOT . "lib/kFunctions.php";	
	require_once LIB_ROOT . "lib/kMod.php";

	$kSQL = new kSQL;

	if(isset($_POST['action']))
	{
		require_once MY_ROOT . "lib/kReceiver.php";
		$kReceiver = new kReceiver();
		exit();
	}

	$kSession = new kSession();
	$kPages = new kPages();

?>
