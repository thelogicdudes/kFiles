<?
	class kTools
	{
		function __construct()
		{
		}
		public function fb_check()
		{
			require_once(MY_ROOT . "lib/fb/facebook.php");
			$config['appId'] = FB_APP_ID;
			$config['secret'] = FB_APP_SECRET;
			$facebook = new Facebook($config);
			$user = $facebook->getUser();
			if($user) echo "1";
			else echo "0";
		}
		public function fb_url()
		{
			$url = "https://www.facebook.com/dialog/oauth/?client_id=" . FB_APP_ID . "&redirect_uri=" . urlencode(FB_CALLBACK_URL);
			echo $url;		
		}
		public function fb_post($post)
		{
			require_once(MY_ROOT . "lib/fb/facebook.php");
			$config['appId'] = FB_APP_ID;
			$config['secret'] = FB_APP_SECRET;
			$facebook = new Facebook($config);
			$facebook->setAccessToken(FB_ACCESS_TOKEN);
			$info['message'] = $post;
			$where = FB_PAGE_ID . "/feed";
			$facebook->api($where,'POST',$info);
		}
		public function tw_tweet($tweet)
		{
			require_once MY_ROOT . "lib/tw/twitteroauth.php";
			$twitter = new TwitterOAuth(TW_APP_KEY, TW_APP_SECRET, TW_ACCESS_TOKEN, TW_ACCESS_SECRET);
			$info['status'] = $tweet;
			$twitter->post('statuses/update', $info);
		}
	}
?>