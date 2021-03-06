<?

	define("MY_ROOT", "/var/www/site.tld/");
	define("LIB_ROOT", "/var/www/comm/kFiles/");

	require_once MY_ROOT . "lib/secret/define.php";
	require_once MY_ROOT . "lib/kPages.php";
	require_once LIB_ROOT . "lib/kSQL.php";	
	require_once LIB_ROOT . "lib/kSession.php";	
	require_once LIB_ROOT . "lib/kFunctions.php";	
	require_once LIB_ROOT . "lib/kMod.php";
	require_once LIB_ROOT . "kadmin/kPages.php";
	require_once LIB_ROOT . "kadmin/kAuth.php";
	require_once LIB_ROOT . "kadmin/kTools.php";

	$kSQL = new kSQL();
	$kTools = new kTools();

	if(isset($_POST['action']))
	{
		require_once LIB_ROOT . "kadmin/kReceiver.php";
		$kReceiver = new kReceiver();
		exit();
	}
	$kSession = new kSession();
	$kPages = new kPages();

?>
