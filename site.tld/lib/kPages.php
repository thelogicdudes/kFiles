<?
class kPages
{

	private $keywords;
	private $title;
	private $date;
	private $description;
	private $page; 
	private $pinfo; 
	private $ppage = null; 
	private $is_bot = false; 
	private $is_mobile = false; 
	private $pages = "home";
	private $sppage;
	private $sppinfo;
	private $device;

	function __construct()
	{
		require_once MY_ROOT . "lib/kStyle.php";
		require_once MY_ROOT . "lib/kScript.php";
		global $kSession;
		$this->kMod = new kMod;
		$this->page = $kSession->page;
		$this->pinfo = $kSession->pinfo;
		$this->ppage = $kSession->ppage;
		$this->is_bot = $kSession->is_bot;
		$this->is_mobile = $kSession->is_mobile;
		switch($this->page)
		{
			case "home":
				$this->title = "Site.TLD - HOME!";
				$this->description = "";
				$this->headers();
				$this->home();
				break;
			case "about":
				if($this->pinfo != 'none') $thing = $this->pinfo;
				else $thing = "About";
				$thing = ucfirst($thing);
				$this->title = "$thing - Site.TLD";
				$this->headers();
				$this->about();
				break;
			case "404":
				$this->title = "404 - Site.TLD";
				$this->description = "Site.TLD - Page Not Found";
				$this->headers();
				$this->k404();
				break;
			case "403":
				$this->title = "403 - Site.TLD";
				$this->headers();
				$this->k403();
				break;
			default:
				header(" Location: " . MY_URL . "/404");
				break;
		}
	}

	private function headers()
	{
		?>
			<!DOCTYPE html>
			<html>
				<head>
					<title><?=$this->title;?></title>
					<link rel="icon" type="image/png" href="<?=MY_URL;?>style/images/logos/favicon.png">
					<link href="https://plus.google.com/u/0/106767921923402943430" rel="publisher">
					<meta name="author" content="Kevin Ashcraft" >
					<!--<meta http-equiv="refresh" content="5">-->
					<meta name="generator" content="Bluefish 2.2.3" >
					<meta name="keywords" content="<?=$this->keywords;?>">
					<meta name="description" content="<?=$this->description;?>">
					<meta Name="Copyright" content="2013 LogicDudes. All rights reserved.">
					<meta http-equiv="Cache-Control" content="no-cache">   
					<meta http-equiv="Pragma" content="no-cache">
					<meta http-equiv="Window-target" content="_top">
					<meta name="date" content="2013-03-13T17:38:48-0400" >
    				<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
    				<meta charset="UTF-8">
					<script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
					<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Exo">
    					<!--[if lt IE 9]>
						<script src="<?=MY_URL;?>lib/js/html5shiv.js"></script>
						<script src="<?=MY_URL;?>lib/js/css3-mediaqueries.js"></script>
					<![endif]-->
					<? $kStyle = new kStyle("home"); ?>
					<? $kScript = new kScript("home"); ?>
				</head>
				<body>
					<!-- Google Analytics -->
					<script type="text/javascript">
						var _gaq = _gaq || [];
						_gaq.push(['_setAccount', '<?=GANALYTICS_ID;?>']);
						_gaq.push(['_setDomainName', '<?=MY_DOMAIN_NAME;?>']);
						_gaq.push(['_trackPageview']);
						(function() {
							var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
							ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
						})();
					</script>
					<!--<div id="fb-root"></div>-->
					<div class="wrapper">
						<header class="main">
							<p class="slogan">We Handle<br>Your<br>Information</p>
							<? if(!$this->is_mobile) { ?>
							<div id="twitter_box"><? $kMod_twitter = new kMod("twitter_box"); ?></div>
 							<? } ?>
							<div class="logo">
								<? if($this->is_mobile) { ?> <a href="//logicdudes.com/" title="LogicDudes"><img src="//logicdudes.com/style/images/logos/logicdudes_small.png" alt="LogicDudes"></a> <? } else { ?>	
								<a href="//logicdudes.com/" title="LogicDudes"><img src="//logicdudes.com/style/images/logos/logicdudes.png" alt="LogicDudes"></a>	 <? } ?>
								<div class="social_buttons">
									<a href="" class="f">f</a>
									<a href="" class="g">g+</a>
									<a href="" class="t">t</a>
								</div>
							</div>
							<div class="nav_buttons">
								<a href="<?=MY_URL;?>about/">About</a>
								<a href="<?=MY_URL;?>blog/">Blog</a>
								<a href="<?=MY_URL;?>contact/">Contact</a>
							</div>
						</header>
			<?
		}

	private function home()
	{
		?>
						<div id="guts">
							<section class="recent_posts">
								<h1>Recent Posts</h1>
							</section>
							<section class="main">
								<h1>Welcome to the Future</h1>
								<p>
									The keyword is information. It is 2013 and knowledge now travels by the nanosecond. Your business is no longer confined to a physical building servicing local clientel; your office is your wesite and digital advertisement (SEO) now allows you to target your desired customers world-wide with an easy-to-update message. The future is here and the future is <b>powerfully fast!</b>
								</p>
							</section>
							<section class="main">
								<h1>LogicDudes</h1>
								<p>
									We are here to modernize your company and make sure you do not get left behind. Our services include website design, search engine optimization (SEO), social networking, information security, and on-site consultations. The world evolves daily and we keep you up-to-date.
									<br>
									Do not let time pass you by, take advantage of your tools and contact us now!
								</p>
							</section>
						</div>
		<?
		$this->footer();
	}
	private function about()
	{
		if($this->pinfo == "none")
		{
			?>
						<div id="guts">
							<section class="main one">
								<h1>Who are We?</h1>
								<p>
									LogicDudes is a group of technically minded Internet enthuiasts who take pride in their coding and social networking skills.
									<br>
									We use <a href="http://en.wikipedia.org/wiki/Open_source" title="Open Source the World!">OpenSource</a> software for our servers and scripting engines.
									<br>
									We believe the Internet is one of the coolest things ever to exist!
									<br>
									We may be new to the game, but we have been practicing for over a decade. <a href="<?=MY_URL;?>contact/">Contact</a> us today to learn more and see how we can help your company grow! 
								</p>
							</section>
							<section class="main two">
								<h1>What do we Do?</h1>
								<p>
									Simply speaking, LogicDudes handles all of your digital information.
									<br>
									That means we create, host, and manage your website, coordinate your social network, setup and inspect your backups (client data, media, QuickBooks files, etc.), and provide recommendations to ensure your data is properly safe and secure. 
									<br>
									Checkout our <a href="<?=MY_URL;?>about/services/">services</a> for more information.
								</p>
							</section>
							<section class="main three">
								<h1>Why Hire Us?</h1>
								<p>
									Is your website mobile friendly? (This matters with SEO)
									<br>
									How many customers are you NOT gaining because your company is NOT in the top search engine results?
									<br>
									Do you receive weekly analytic reports showing how your Internet advertising campaign has increased?
									<br>
									Most importantly, do you know who has access to your critical data and what to do if it becomes corrupt, stolen, or accidentally deleted? 									
								</p>
							</section>
							<section class="recent_posts">
								<h1>Recent Posts</h1>
							</section>
						</div>
			<?
			$this->footer();
		}
		if($this->pinfo == "services")
		{
			?>
						<div id="guts">							
							<section class="recent_posts">
								<h1>Recent Posts</h1>
							</section>
							<section class="main one">
								<h1>Our Services</h1>
								<p>
									LogicDudes provide web-hosting on our servers which are powered by Amazon's <a href="http://aws.amazon.com/ec2/">EC2</a> Server Cloud and running Ubuntu Server. 
									<br>
									We create websites using PHP server-side scripting incorporating SEO and mobile design based on CSS3 and HTML5.
									<br>
									The website is a central point for social networking, which we maintain posting your companies current promotions and recommendation. 
									<br>
									Our data and our client's data is maintained via incremental (snap-shot style) backups redundantly synced between three locations.
									<br>
									Finally, security. We offer on-site security audits inspecting your office digitally and physically for vulnerabilities, repairing immediate issues, and providing recommendations for future security policy. 
								</p>
							</section>
						</div>
			<?
			$this->footer();
		}
	}
	private function footer()
	{
		?>
						<div class="spacer"></div>
							<footer class="main">
								<div class="contact_info">
									<p>Physical Location: <a href="http://maps.google.com/maps?q=orlando+fl" title="Orlando, FL" target="_blank">Orlando, FL</a></p>
									<p>(407) 477-4284</p>
									<p>PO Box 25555<br>Orlando, FL 32701</p>
								</div>
								<nav>
									<p><a href="<?=MY_URL;?>">Home</a> | <a href="<?=MY_URL;?>about/">About</a> | <a href="<?=MY_URL;?>about/services/">Services</a> | <a href="<?=MY_URL;?>blog/howto/">HowTo's</a> | <a href="<?=MY_URL;?>contact/">Contact</a></p>						
								</nav>
								<div class="icons">
									<a href="http://www.w3schools.com/" title="W3 - The Standard for WebDesign" target="_blank"><img src="<?=MY_URL;?>style/images/logos/w3.png" alt="W3 Logo" ></a>
									<a href="http://http://www.tizag.com/" title="Tizag Tutorials" target="_blank"><img src="<?=MY_URL;?>style/images/logos/tizag.png" alt="Tizag Logo" ></a>
									<a href="http://php.net/" title="PHP.net Hypertext Preprocessor" target="_blank"><img src="<?=MY_URL;?>style/images/logos/php.png" alt="PHP Logo" ></a>
									<a href="http://www.mysql.com/" title="MySQL - Performance & Scalability" target="_blank"><img src="<?=MY_URL;?>style/images/logos/mysql.png" alt="MySQL Logo" ></a>
									<a href="http://en.wikipedia.org/wiki/HTML5" title="HTML5 - The Cool New Standard" target="_blank"><img src="<?=MY_URL;?>style/images/logos/html5.png" alt="HTML5 Logo" ></a>
									<a href="http://httpd.apache.org/" title="Apache - The Powerful OpenSource WebServer" target="_blank"><img src="<?=MY_URL;?>style/images/logos/apache.png" alt="Apache Logo" ></a>
									<a href="http://www.ubuntu.com/business/server" title="Ubuntu Server - OpenSource Power" target="_blank"><img src="<?=MY_URL;?>style/images/logos/ubuntu.png" alt="Ubuntu Logo" ></a>
								</div>
								<p class="cright">&copy; 2013</p>
							</footer>
						<footer class="mobile">
								<p>Are you modern?</p>
								<p>Take our <a href="<?=MY_URL;?>quiz/" title="The Modern Quiz">quiz</a></p>
						</footer>
					</div>
				</body>
			</html>
		<?
	}

	private function contact()
	{
		?>
		<?
	}

	private function contact_webmaster()
	{
		?>
		<?
	}

	private function blog()
	{
		?>
		<?
	}

	private function k404()
	{
		?>
						<section class="main">
							<header>
								<h1>Page Not Found!</h1>
								<p>Click <a href="<?=MY_URL;?>">here</a> if you're not automatically redirected...</p>
							</header>
						</section>
						<script type="text/javascript" >
							setTimeout(function(){ window.location = '<?=MY_URL;?>'; }, 2250);
						</script>
		<?
	}

	private function k403()
	{
		?>
						<section class="main">
							<header>
								<h1>Ah, ah, ah...</h1>
								<p><img src="<?=MY_URL;?>style/images/misc/ahahah.jpg" alt="ah, ah, ah" ></p>
								<p>Click <a href="<?=MY_URL;?>">here</a> if you're not automatically redirected...</p>
							</header>
						</section>
						<script type="text/javascript" >
							setTimeout(function(){ window.location = '<?=MY_URL;?>'; }, 2250);
						</script>
		<?
	}
}
