<?
	define("MY_ROOT", "/var/www/site.tld/");

	require_once MY_ROOT . "lib/secret/define.php";

	$code = $_GET['code'];
	$token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=" . FB_APP_ID . "&redirect_uri=" . FB_CALLBACK_URL
       . "&client_secret=" . FB_APP_SECRET . "&code=" . $code;
   $response = file_get_contents($token_url);
   $params = null;
   parse_str($response, $params);
	echo "Token: " . $params['access_token'];

?>