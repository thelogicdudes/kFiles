<?

	define("MY_ROOT", "ROOT FILE LOCATION GOES HERE!");

	require_once MY_ROOT . "lib/secret/define.php";
	require_once MY_ROOT . "lib/kSQL.php";	
	require_once MY_ROOT . "lib/kSession.php";	
	require_once MY_ROOT . "lib/kFunctions.php";	
	require_once MY_ROOT . "kadmin/lib/kPages.php";
	require_once MY_ROOT . "kadmin/lib/kAuth.php";
	require_once MY_ROOT . "kadmin/lib/kTools.php";

	$kSQL = new kSQL();
	$kTools = new kTools();

	if(isset($_POST['action']))
	{
		require_once MY_ROOT . "kadmin/lib/kReceiver.php";
		$kReceiver = new kReceiver();
		exit();
	}
	$kSession = new kSession();
	$kPages = new kPages();

?>
