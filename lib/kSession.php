<?
	class kSession
	{
		public $sid = null;
		public $is_bot = 1;
		public $is_mobile = false;
		public $page = "home";
		public $pinfo = "none";
		public $ppage = "none";
		
		function __construct() 
		{
			global $kSQL;
			require_once 'Mobile_Detect.php';
			$Mobile_Detect = new Mobile_Detect;
			$this->is_mobile = $Mobile_Detect->isMobile(); 
			$IP = ip2long($_SERVER['REMOTE_ADDR']);
			$userAgent = $_SERVER['HTTP_USER_AGENT'];
			$crawlers = 'Google|msnbot|Rambler|Yahoo|AbachoBOT|accoona|AcioRobot|ASPSeek|CocoCrawler|Dumbot|FAST-WebCrawler|GeonaBot|Gigabot|Lycos|MSRBOT|Scooter|AltaVista|IDBot|eStyle|Scrubby';
			if(preg_match("/$crawlers/i", $userAgent))
			{
				$this->is_bot = 1;
			}
			else $this->is_bot = 0;
			if(isset($_GET['page'])) if($_GET['page'] != "") $this->page = $_GET['page'];
			if(isset($_GET['pinfo'])) $this->pinfo = $_GET['pinfo'];
			if($this->is_bot == 0)
			{
				session_start();
				$this->sid = session_id();
			}
			else $this->sid = 'No, I am a crawler';
			if(isset($_SERVER['HTTP_REFERER'])) $this->ppage = $ppage = $_SERVER['HTTP_REFERER'];
			$ua=getBrowser();
			$url = curPageURL();
			if(preg_match('/kadmin/i', $url)) $admin = 1;
			else $admin = 0;
			$ins['table'] = 'visits';
			$ins['rows'] = "session_id, page_name, page_info, IP, previous_page, browser_name, browser_version, os, user_agent, is_bot, url, admin";
			$ins['values'] = "'$this->sid', '$this->page', '$this->pinfo', '$IP', '$this->ppage', '".$ua['name']."', '".$ua['version']."', '".$ua['platform']."', '$userAgent', '$this->is_bot', '$url', '$admin'";
			$kSQL->insert($ins);
		}
	}

?>