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
	private $kAuth;
	private $kSQL;
	private $kStyle;
	private $kScript;
	private $kTools;

	function __construct()
	{
		require_once "kStyle.php";
		require_once "kScript.php";
		global $kSession;
		global $kSQL;
		global $kTools;
		$this->kSQL = $kSQL;
		$this->kTools = $kTools;
		$this->page = $kSession->page;
		$this->pinfo = $kSession->pinfo;
		$this->ppage = $kSession->ppage;
		$this->is_bot = $kSession->is_bot;
		$this->is_mobile = $kSession->is_mobile;
		$this->kAuth = new kAuth();
		if(!$this->kAuth->verify() && $this->page != "login") header("Location: " . MY_KADMIN_URL . "/login");
		switch($this->page)
		{
			case "login":
				if($this->kAuth->verify()) header("Location: " . MY_KADMIN_URL . "/authed");
				$this->keywords = "";
				$this->title = "kAdmin";
				$this->date = "2013-01-21T21:05:03-0500";
				$this->description = "Backend Page Manipulation - Userfriendly style";
				$this->login();
				break;
			case "authed":
				$this->keywords = "";
				$this->title = "kAdmin - Blog";
				$this->date = "2013-01-21T21:05:03-0500";
				$this->description = "Backend Page Manipulation - Userfriendly style";
				$this->home();
				break;
			case "users":
				$this->keywords = "";
				$this->title = "kAdmin - Users";
				$this->date = "2013-01-21T21:05:03-0500";
				$this->description = "Backend Page Manipulation - Userfriendly style";
				$this->users();
				break;
			case "blog":
				$this->keywords = "";
				$this->title = "kAdmin - Blog";
				$this->date = "2013-01-21T21:05:03-0500";
				$this->description = "Backend Page Manipulation - Userfriendly style";
				$this->blog();
				break;
			case "news":
				$this->keywords = "";
				$this->title = "kAdmin - News";
				$this->date = "2013-01-21T21:05:03-0500";
				$this->description = "Backend Page Manipulation - Userfriendly style";
				$this->news();
				break;
			case "events":
				$this->keywords = "";
				$this->title = "kAdmin - Events";
				$this->date = "2013-01-21T21:05:03-0500";
				$this->description = "Backend Page Manipulation - Userfriendly style";
				$this->events();
				break;
			case "visits":
				$this->keywords = "";
				$this->title = "kAdmin - Visits";
				$this->date = "2013-01-21T21:05:03-0500";
				$this->description = "Backend Page Manipulation - Userfriendly style";
				$this->visits();
				break;
			default:
				header("Location: " . MY_KADMIN_URL . "/login");
				break;
		}
	}


	public function login()
	{
		?>
			<!DOCTYPE html>
			<html>
				<head>
					<title>KAdmin - <?=MY_URL;?></title>
			   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
					<? $this->kScript = new kScript("login"); ?>
					<? $this->kStyle = new kStyle("main"); ?>
					<!--[if lt IE 9]>
						<script src="<?=MY_KADMIN_URL;?>lib/js/html5shiv.js"></script>
						<script src="<?=MY_KADMIN_URL;?>lib/js/css3-mediaqueries.js"></script>
					<![endif]-->
					<link rel="icon" type="image/png" href="<?=MY_KADMIN_URL;?>/media/images/favicon.png">
    				<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
				</head>
				<body>
					<div id="pageholder">
						<a href="<?=MY_KADMIN_URL;?>" class="logo"><img src="<?=MY_KADMIN_URL;?>/media/images/kadminlogo.png" alt="KAdmin Logo"></a>
						<a class="parent_logo" href="<?=MY_URL;?>" title="<?=MY_URL;?>" target="_blank"><img src="<?=MY_URL;?>style/images/logos/mylogo_small.png" alt="<?=MY_URL;?> Logo" ></a>
						<form onsubmit="login(); return false;" class="login-box">
							<h1>KAdmin Authentication</h1>
							<div id="login_status"><img src='<?=MY_KADMIN_URL;?>/media/images/progress.gif'></div>
							<br style="line-height: 85px;">
							<label>eMail:</label><input type="email" name="usremail" id="usremail" placeholder="email@address.com" title="Type Your Email Address Here">
							<br style="line-height: 35px;">
							<label>Password:</label><input type="password" name="password" id="password" placeholder="Password" title="Your Secure Password">
							<br style="line-height: 45px;">
							<input type="submit" value="LogIn">
						</form>		
					</div>
				</body>
			</html>
		<?
	}
	public function authed_headers()
	{
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>KAdmin - <?=MY_URL;?></title>
	   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
			<? $this->kScript = new kScript("authed"); ?>
			<? $this->kStyle = new kStyle("authed"); ?>
					<!--[if lt IE 9]>
						<script src="<?=MY_KADMIN_URL;?>/lib/js/html5shiv.js"></script>
						<script src="<?=MY_KADMIN_URL;?>/lib/js/css3-mediaqueries.js"></script>
					<![endif]-->
			<link rel="icon" type="image/png" href="<?=MY_KADMIN_URL;?>/media/images/favicon.png">
    		<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
    	</head>
		<body>
			<a href="<?=MY_KADMIN_URL;?>" class="logo"><img src="<?=MY_KADMIN_URL;?>/media/images/kadminlogo.png" alt="KAdmin Logo"></a>
			<a class="parent_logo" href="<?=MY_URL;?>" title="<?=MY_URL;?>" target="_blank"><img src="<?=MY_URL;?><?=MY_LOGO_URL;?>" alt="<?=MY_URL;?> Logo" ></a>
			<div class="user_controls"><?=$_SESSION['fname'];?>
				<div>
					<a href="<?=MY_KADMIN_URL;?>/users/<?=$_SESSION['uid'];?>">Settings</a>
					<a href="#" onclick="logmeout();">Logout</a>				
				</div>
			</div>
			<nav>
				<ul>
					<li>
						<a href="<?=MY_KADMIN_URL;?>/users">Users <img src="<?=MY_KADMIN_URL;?>/media/images/usersicon.png" alt="User Icon"></a>
						<ul>
							<li><a href="<?=MY_KADMIN_URL;?>/users/admins">Admins</a></li>
							<li><a href="<?=MY_KADMIN_URL;?>/users/citizens">Citizens</a></li>
							<li><a href="<?=MY_KADMIN_URL;?>/users/new">New User</a></li>
						</ul>
					</li>
					<li>
						<a href="<?=MY_KADMIN_URL;?>/blog">Blog <img src="<?=MY_KADMIN_URL;?>/media/images/blogicon.png" alt="Blog Icon"></a>
						<ul>
							<li><a href="<?=MY_KADMIN_URL;?>/blog/all">All Posts</a></li>
							<li><a href="<?=MY_KADMIN_URL;?>/blog/recent">Recent Posts</a></li>
							<li><a href="<?=MY_KADMIN_URL;?>/blog/mine">My Posts</a></li>
							<li><a href="<?=MY_KADMIN_URL;?>/blog/new">New Post</a></li>
						</ul>
					</li>
					<li>
						<a href="<?=MY_KADMIN_URL;?>/news">News <img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="News Icon"></a>
						<ul>
							<li><a href="<?=MY_KADMIN_URL;?>/news/new">New News</a></li>
							<li><a href="<?=MY_KADMIN_URL;?>/news/recent">Recent News</a></li>
						</ul>
					</li>
					<li>
						<a href="<?=MY_KADMIN_URL;?>/events">Events <img src="<?=MY_KADMIN_URL;?>/media/images/eventsicon.png" alt="Events Icon"></a>
						<ul>
							<li><a href="<?=MY_KADMIN_URL;?>/events/new">New Events</a></li>
							<li><a href="<?=MY_KADMIN_URL;?>/events/recent">Recent Events</a></li>
						</ul>
					</li>
					<li>
						<a href="<?=MY_KADMIN_URL;?>/visits">Visits <img src="<?=MY_KADMIN_URL;?>/media/images/visitsicon.png" alt="Blog Icon"></a>
					</li>
				</ul>
		</nav>
		<div id="main_viewer">
	<?
	}
	
	public function close_it_up()
	{
	?>
			</div>
		</body>
	</html>
	<?
	}	

	public function home()
	{			
			
		$this->authed_headers();
		?>
					<div id="new_entry" style="display: none"></div>
					<h1>Main Viewer - Home</h1>
					<div id="mv_contents">
						<h2>Welcome</h2>
						<p>
							Welcome to KAdmin!
							<br>
							Here you can make a new <a href="#" onclick="kAction('blogNew');">blog posts</a> or <a href="#" onclick="kAction('blogNew');">news entries.</a>
							<br>
							You can view your site's list of visitors including <a href="#" onclick="kAction('visitsReal');">real people</a> and <a href="#" onclick="kAction('visitsCrawlers');">crawlers.</a>
							<br>
							Please <a href="#" onclick="kAction('contactMe');">contact me</a> with any questions or comments:-)
						</p>
					</div>
		<?
		$this->close_it_up();
	}


	public function users()
	{
		$this->authed_headers();
//		$this->kStyle->blog();

		switch($this->pinfo)
		{
			case "none":
				?>
				<? $this->kStyle->users(); ?>
				<h1>Users <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/usersicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="user_type_select"><a href="<?=MY_KADMIN_URL;?>/users/admins" style="float: left"><img src="<?=MY_KADMIN_URL;?>/media/images/admins2.png" alt="Administrators"></a><a href="<?=MY_KADMIN_URL;?>users/citizens/" style="float: right"><img src="<?=MY_KADMIN_URL;?>/media/images/citizens.png" alt="Citizens"></a></div>
				</div>
				<?
				break;
			case "admins":
				?>
				<h1>Administrators <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/usersicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="list_container">
						<div class="list_row">
							<span class="list_item">Firstname Lastname</span>
							<span class="list_item">User ID</span>
							<span class="list_item">Email Address</span>
							<span class="list_item">Group ID</span>
						</div>
						<br><br>
						<?
							$q['table'] = "users";
							$q['where'] = "gid = 5";
							$res = $this->kSQL->selectfe($q);
							foreach($res as $sr)
							{
								?>
									<a class="list_link" href="<?=MY_KADMIN_URL;?>users/<?=$sr->id;?>/">
										<div class="list_row">
											<span class="list_item"><?=$sr->fname . " " . $sr->lname;?></span>
											<span class="list_item"><?=$sr->id;?></span>
											<span class="list_item"><?=$sr->usremail;?></span>
											<span class="list_item"><?=$sr->gid;?></span>
										</div>
									</a>
								<?
							}
						?>	
					</div>
				</div>
				<?
				break;
			case "citizens":
				?>
				<h1>Citizens <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/usersicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="list_container">
						<div class="list_row">
							<span class="list_item">Firstname Lastname</span>
							<span class="list_item">User ID</span>
							<span class="list_item">Email Address</span>
							<span class="list_item">Group ID</span>
						</div>
						<br><br>
						<?
							$q['table'] = "users";
							$q['where'] = "gid < 5";
							$res = $this->kSQL->selectfe($q);
							foreach($res as $sr)
							{
								?>
									<a class="list_link" href="<?=MY_KADMIN_URL;?>users/<?=$sr->id;?>/">
										<div class="list_row">
											<span class="list_item"><?=$sr->fname . " " . $sr->lname;?></span>
											<span class="list_item"><?=$sr->id;?></span>
											<span class="list_item"><?=$sr->usremail;?></span>
											<span class="list_item"><?=$sr->gid;?></span>
										</div>
									</a>
								<?
							}
						?>	
					</div>
				</div>
				<?
				break;
			case "new":
				?>
				<h1>New User <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/usersicon.png" alt="Users Icon"></h1>
				<div id="mv_contents">
					<form id="a_form">
						<input type="hidden" name="action" value="new_user">
						<input type="hidden" name="created_by_id" value="<?=$_SESSION['uid'];?>">
						<input type="hidden" name="created_by_ip" value="<?=$_SESSION['ip'];?>">
						<p><span>First Name: </span><input type="text" name="fname" placeholder="First Name"></p>
						<p><span>Last Name: </span><input type="text" name="lname" placeholder="Last Name"></p>
						<p><span>Email Address: </span><input type="text" name="usremail" placeholder="Email Address"></p>
						<p><span>Password: </span><input type="password" name="password" placeholder="Password"></p>
						<p><span>Group:</span><select name="gid"><option value="0" selected="selected">Disabled (0)</option><option value="1">Citizen (1)</option><option value="2">Writer (2)</option><option value="3">Editor (3)</option><option value="4">Moderator (4)</option><option value="5">Administrator (5)</option></select></p>
						<p><span>Created by: </span><input type="text" name="created_by_name" value="<?=$_SESSION['fname'] . " " . $_SESSION['lname'];?>" disabled="disabled"></p>
						<p><span>Created on: </span><input type="text" name="created_on" placeholder="date" value="<?=date('M-d Y');?>" id="form_date" disabled="disabled"></p>
						<p><span>Created at: </span><input type="time" name="created_at" placeholder="time" value="<?=date('g:i a');?>" disabled="disabled"></p>
						<br>
						<input type="submit" id="subutt" value="Create!">
					</form>
				</div>
				<?
				break;
			default:
				$q['table'] = "users";
				$q['where'] = "id = '$this->pinfo'";
				$res = $this->kSQL->select($q);
				if(isset($res))
				{
				?>
				<h1><?=$res->fname . " " . $res->lname . " at";?> <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/usersicon.png" alt="Users Icon"></h1>
				<div id="mv_contents">
					<form id="a_form">
						<input type="hidden" name="action" value="update_user">
						<input type="hidden" name="user_id" value="<?=$res->id;?>">
						<input type="hidden" name="created_by_id" value="<?=$res->created_by_id;?>">
						<input type="hidden" name="created_by_ip" value="<?=$_SESSION['ip'];?>">
						<p><span>First Name: </span><input type="text" name="fname" placeholder="First Name" value="<?=$res->fname;?>" disabled="disabled"></p>
						<p><span>Last Name: </span><input type="text" name="lname" placeholder="Last Name" value="<?=$res->lname;?>" disabled="disabled"></p>
						<p><span>Email Address: </span><input type="text" name="email" placeholder="Email Address" value="<?=$res->usremail;?>" disabled="disabled"></p>
						<p><span>Password: </span><input type="password" name="password" placeholder="Password" value="Not Changed" disabled="disabled" onfocus="if($(this).val() == 'Not Changed') $(this).val(''); "></p>
						<p><span>Group:</span><select name="gid" disabled="disabled"><option value="0" <? if($res->gid == '0') echo "selected='selected'"; ?> >Disabled (0)</option><option value="1" <? if($res->gid == '1') echo "selected='selected'"; ?> >Citizen (1)</option><option value="2" <? if($res->gid == '2') echo "selected='selected'"; ?> >Writer (2)</option><option value="3" <? if($res->gid == '3') echo "selected='selected'"; ?> >Editor (3)</option><option value="4" <? if($res->gid == '4') echo "selected='selected'"; ?> >Moderator (4)</option><option value="5" <? if($res->gid == '5') echo "selected='selected'"; ?> >Administrator (5)</option></select></p>
						<p><span>Created by: </span><span><?=$res->created_by_name;?> / <?=$res->created_by_id;?></span></p>
						<p><span>Created on: </span><span><?=$res->created_on;?></span></p>
						<p><span>Created at: </span><span><?=$res->created_at;?></span></p>
						<br>
						<input type="submit" id="subutt" value="Submit!" style="display: none;">
						<button id="delbutt" type="button" onclick="del_user('<?=$this->pinfo;?>', '<?=$res->fname . " " . $res->lname;?>');">Delete User</button>
						<a href="#" class="lockunlock" onclick="form_change(this);"><img src="<?=MY_KADMIN_URL;?>/media/images/lock.png" alt="Locked"></a>
					</form>
				</div>
				<?
				}
				else
				{
					echo "<div id='mv_contents'>Redirecting...</div><script>window.location='" . MY_KADMIN_URL . "users/';</script>";
				}
				break;
		}
	$this->kScript->blog();
	$this->close_it_up();
	}

	
	public function blog()
	{
		$this->authed_headers();
		$this->kStyle->blog();

		switch($this->pinfo)
		{
			case "none":
				?>
				<h1>Blogs <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="blog_home">
						<a href="<?=MY_KADMIN_URL;?>/blog/all"><img src="<?=MY_KADMIN_URL;?>/media/images/blogall.png" alt="All Blogs"></a>
						<a href="<?=MY_KADMIN_URL;?>/log/recent"><img src="<?=MY_KADMIN_URL;?>/media/images/blogrecent.png" alt="Recent Blogs"></a>
						<a href="<?=MY_KADMIN_URL;?>/blog/mine"><img src="<?=MY_KADMIN_URL;?>/media/images/blogmine.png" alt="My Blogs"></a>
					</div>
				</div>
				<?
				break;
			case "all":
				?>
				<h1>All Blogs <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="list_container">
						<div class="list_row">
							<span class="list_item">Title</span>
							<span class="list_item">Author</span>
							<span class="list_item">Published</span>
						</div>
						<br><br>
						<?
							$q['table'] = "blog";
							$res = $this->kSQL->selectfe($q);
							foreach($res as $sr)
							{
								?>
									<a class="list_link" href="<?=MY_KADMIN_URL;?>blog/<?=$sr->id;?>/">
										<div class="list_row">
											<span class="list_item"><?=$sr->title;?></span>
											<span class="list_item"><?=$sr->created_by_name;?></span>
											<span class="list_item"><?=$sr->created_on;?></span>
										</div>
									</a>
								<?
							}
						?>	
					</div>
				</div>
				<?
				break;
			case "recent":
				?>
				<h1>Recent Blogs <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="list_container">
						<div class="list_row">
							<span class="list_item">Title</span>
							<span class="list_item">Author</span>
							<span class="list_item">Published</span>
						</div>
						<br><br>
						<?
							$q['table'] = "blog";
							$q['where'] = "created_on > (NOW() - INTERVAL 1 WEEK)";
							$res = $this->kSQL->selectfe($q);
							if(isset($res[0]))
							{
								foreach($res as $sr)
								{
									?>
										<a class="list_link" href="<?=MY_KADMIN_URL;?>blog/<?=$sr->id;?>/">
											<div class="list_row">
												<span class="list_item"><?=$sr->title;?></span>
												<span class="list_item"><?=$sr->created_by_name;?></span>
												<span class="list_item"><?=$sr->created_on;?></span>
											</div>
										</a>
									<?
								}
							}
						else
						{
						?>
							<p>There are no recent posts...<a href="<?=MY_KADMIN_URL;?>blog/new/">Click Here</a> to write one!</p>
						<?
						}
						?>	
					</div>
				</div>
				<?
				break;
			case "mine":
				?>
				<h1>My Blogs <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="list_container">
						<div class="list_row">
							<span class="list_item">Title</span>
							<span class="list_item">Author</span>
							<span class="list_item">Published</span>
						</div>
						<br><br>
						<?
							$q['table'] = "blog";
							$q['where'] = "created_on > (NOW() - INTERVAL 1 WEEK)";
							$res = $this->kSQL->selectfe($q);
							if(isset($res[0]))
							{
								foreach($res as $sr)
								{
									?>
										<a class="list_link" href="<?=MY_KADMIN_URL;?>blog/<?=$sr->id;?>/">
											<div class="list_row">
												<span class="list_item"><?=$sr->title;?></span>
												<span class="list_item"><?=$sr->created_by_name;?></span>
												<span class="list_item"><?=$sr->created_on;?></span>
											</div>
										</a>
									<?
								}
							}
						else
						{
						?>
							<p>It appears that you have not written any posts...<a href="<?=MY_KADMIN_URL;?>blog/new/">Click Here</a> to write one!</p>
						<?
						}
						?>	
					</div>
				</div>
				<?
				break;
			case "new":
				?>
				<h1>New Blog for <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
						<div class="select_image">
							<form id="image_upload">						
								<input type="url" name="image_url" placeholder="Image Url">
								<p>---OR---</p>
								<input type="file" id="image_file" name="image_file" form="none">
								<p>---OR---</p>
								<p>Drag and Drop and Image onto the Page</p>
								<button type="submit">Upload!</button>
							</form>
						</div>
					<form id="form">
						<input type="hidden" name="action" value="new_blog">
						<input type="hidden" name="created_by_name" value="<? echo $_SESSION['fname'] . " " . $_SESSION['lname'];?>">
						<input type="hidden" name="created_by_id" value="<?=$_SESSION['uid'];?>">
						<input type="hidden" name="created_by_ip" value="<?=$_SESSION['ip'];?>">
						<input type="hidden" name="author_url" value="<?=$_SESSION['user_url'];?>">
						<input type="hidden" name="author_image_url" value="<?=$_SESSION['user_image_url'];?>">
						<input type="hidden" name="image_url" id="image_url" value="<?=MY_KADMIN_URL;?>/media/images/blog/defaultblog.png">
						<div class="form_image">
							<a href="#" onclick="$('.select_image').fadeIn();"><img src="<?=MY_KADMIN_URL;?>/media/images/addimage.png" alt="Add Image"></a>
						</div>
						<div class="user_info">
							<img src="<?=$_SESSION['user_image_url'];?>" alt="<?=$_SESSION['user_image_url'];?>">
							<div>
								<p><?=$_SESSION['fname'];?><br><?=$_SESSION['lname'];?></p>
								<input type="text" name="created_on" placeholder="date" value="<?=date('M-d Y');?>" id="form_date">
								<input type="time" name="created_at" placeholder="time" value="<?=date('g:i a');?>">
							</div>
						</div>
						<input type="text" name="title" placeholder="title" value="tttt">
						<textarea name="contents" onfocus="if($(this).html() == 'Contents....') $(this).html('');">Contents....</textarea>
						<label for="fb">Share to Facebook</label>
						<input type="checkbox" onchange="fcheck();" value="fb" id="fb" name="facebook">
						<textarea id="fb_text" name="fb_text"></textarea>
						<label for="tw">Share to Twitter</label>
						<input type="checkbox" onchange="tcheck();" value="tw" id="tw" name="twitter">
						<textarea id="tw_text" name="tw_text"></textarea>
						<div id="link"><button type="button" onclick="add_url();" id="url_butt">Add Link</button></div>
						<input type="url" id="news_url" name="news_url" placeholder="News Url" value="http://www.google.com">
						<input type="submit" value="Submit!">
						<textarea id="fb_text"></textarea>
						<textarea id="tw_text"></textarea>
					</form>
				</div>
				<?
				break;
			default:
				$q['table'] = 'blog';
				$q['where'] = "id='$this->pinfo'";
				$blog = $this->kSQL->select($q);
				if(!$blog) echo "No Blog Found!";
				else
				{
				?>
				<h1><?=$this->pinfo;?> <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<form id="form">
						<input type="hidden" name="action" value="update_blog">
						<input type="hidden" name="created_by_name" value="<?=$blog->created_by_name;?>">
						<input type="hidden" name="created_by_id" value="<?=$blog->created_by_id;?>">
						<input type="hidden" name="created_by_ip" value="<?=$blog->created_by_ip;?>">
						<div class="form_image">
							<a href="#" onclick="select_image();"><img src="<?=MY_KADMIN_URL;?>/media/images/addimage.png" alt="Add Image"></a>
						</div>
						<div class="select_image">
							<input type="url" name="image_url" placeholder="Image Url" value="http://www.google.com/images/errors/logo_sm.gif">
							<p>---OR---</p>
							<input type="file" name="image_file">
						</div>
						<div class="user_info">
							<img src="<?=$blog->author_image_url;?>" alt="">
							<div>
								<p><?=$blog->created_by_name;?></p>
								<input type="text" name="created_on" placeholder="date" value="<?=$blog->created_on;?>" id="form_date">
								<input type="time" name="created_at" placeholder="time" value="<?=$blog->created_at;?>">
							</div>
						</div>
						<input type="text" name="title" placeholder="title" value="<?=$blog->title;?>">
						<textarea name="contents"><?=$blog->contents;?></textarea>
						<label for="fb">Share to Facebook</label>
						<input type="checkbox" onchange="fcheck();" value="fb" id="fb" name="facebook">
						<textarea id="fbtext"></textarea>
						<label for="tw">Share to Twitter</label>
						<input type="checkbox" onchange="tcheck();" value="tw" id="tw" name="twitter">
						<textarea id="twtext"></textarea>
						<div id="link"><button type="button" onclick="add_url();" id="url_butt">Add Link</button></div>
						<input type="url" id="news_url" name="news_url" placeholder="News Url" value="http://www.google.com">
						<input type="submit" value="Submit!">
						<textarea id="fb_text"></textarea>
						<textarea id="tw_text"></textarea>
					</form>
				</div>
				<?
				}
				break;
		}
	$this->kScript->blog();
	$this->close_it_up();
	}

	public function news()
	{
		$this->authed_headers();
		$this->kStyle->blog();

		switch($this->pinfo)
		{
			case "none":
				?>
				<h1>News <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="blog_home">
						<a href="<?=MY_KADMIN_URL;?>/news/all"><img src="<?=MY_KADMIN_URL;?>/media/images/blogall.png" alt="All News"></a>
						<a href="<?=MY_KADMIN_URL;?>/news/recent"><img src="<?=MY_KADMIN_URL;?>/media/images/blogrecent.png" alt="Recent News"></a>
						<a href="<?=MY_KADMIN_URL;?>/news/mine"><img src="<?=MY_KADMIN_URL;?>/media/images/blogmine.png" alt="My News"></a>
					</div>
				</div>
				<?
				break;
			case "all":
				?>
				<h1>All News <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="list_container">
						<div class="list_row">
							<span class="list_item">Title</span>
							<span class="list_item">Author</span>
							<span class="list_item">Published</span>
						</div>
						<br><br>
						<?
							$q['table'] = "news";
							$res = $this->kSQL->selectfe($q);
							foreach($res as $sr)
							{
								?>
									<a class="list_link" href="<?=MY_KADMIN_URL;?>/news<?=$sr->id;?>/">
										<div class="list_row">
											<span class="list_item"><?=$sr->title;?></span>
											<span class="list_item"><?=$sr->created_by_name;?></span>
											<span class="list_item"><?=$sr->created_on;?></span>
										</div>
									</a>
								<?
							}
						?>	
					</div>
				</div>
				<?
				break;
			case "recent":
				?>
				<h1>Recent News <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="News Icon"></h1>
				<div id="mv_contents">
					<div class="list_container">
						<div class="list_row">
							<span class="list_item">Title</span>
							<span class="list_item">Author</span>
							<span class="list_item">Published</span>
						</div>
						<br><br>
						<?
							$q['table'] = "blog";
							$q['where'] = "created_on > (NOW() - INTERVAL 1 WEEK)";
							$res = $this->kSQL->selectfe($q);
							if(isset($res[0]))
							{
								foreach($res as $sr)
								{
									?>
										<a class="list_link" href="<?=MY_KADMIN_URL;?>blog/<?=$sr->id;?>/">
											<div class="list_row">
												<span class="list_item"><?=$sr->title;?></span>
												<span class="list_item"><?=$sr->created_by_name;?></span>
												<span class="list_item"><?=$sr->created_on;?></span>
											</div>
										</a>
									<?
								}
							}
						else
						{
						?>
							<p>There are no recent posts...<a href="<?=MY_KADMIN_URL;?>blog/new/">Click Here</a> to write one!</p>
						<?
						}
						?>	
					</div>
				</div>
				<?
				break;
			case "mine":
				?>
				<h1>My News <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="News Icon"></h1>
				<div id="mv_contents">
					<div class="list_container">
						<div class="list_row">
							<span class="list_item">Title</span>
							<span class="list_item">Author</span>
							<span class="list_item">Published</span>
						</div>
						<br><br>
						<?
							$q['table'] = "news";
							$q['where'] = "created_on > (NOW() - INTERVAL 1 WEEK)";
							$res = $this->kSQL->selectfe($q);
							if(isset($res[0]))
							{
								foreach($res as $sr)
								{
									?>
										<a class="list_link" href="<?=MY_KADMIN_URL;?>/news<?=$sr->id;?>/">
											<div class="list_row">
												<span class="list_item"><?=$sr->title;?></span>
												<span class="list_item"><?=$sr->created_by_name;?></span>
												<span class="list_item"><?=$sr->created_on;?></span>
											</div>
										</a>
									<?
								}
							}
						else
						{
						?>
							<p>It appears that you have not written any posts...<a href="<?=MY_KADMIN_URL;?>/news/new">Click Here</a> to write one!</p>
						<?
						}
						?>	
					</div>
				</div>
				<?
				break;
			case "new":
				?>
				<h1>New News for <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="News Icon"></h1>
				<div id="mv_contents">
						<div class="select_image">
							<form id="image_upload">						
								<input type="url" name="image_url" placeholder="Image Url">
								<p>---OR---</p>
								<input type="file" id="image_file" name="image_file" form="none">
								<p>---OR---</p>
								<p>Drag and Drop and Image onto the Page</p>
								<button type="submit">Upload!</button>
							</form>
						</div>
					<form id="form">
						<input type="hidden" name="action" value="new_news">
						<input type="hidden" name="created_by_name" value="<? echo $_SESSION['fname'] . " " . $_SESSION['lname'];?>">
						<input type="hidden" name="created_by_id" value="<?=$_SESSION['uid'];?>">
						<input type="hidden" name="created_by_ip" value="<?=$_SESSION['ip'];?>">
						<input type="hidden" name="author_url" value="<?=$_SESSION['user_url'];?>">
						<input type="hidden" name="author_image_url" value="<?=$_SESSION['user_image_url'];?>">
						<input type="hidden" name="image_url" id="image_url" value="<?=MY_KADMIN_URL;?>/media/images/blog/defaultblog.png">
						<div class="form_image">
							<a href="#" onclick="$('.select_image').fadeIn();"><img src="<?=MY_KADMIN_URL;?>/media/images/addimage.png" alt="Add Image"></a>
						</div>
						<div class="user_info">
							<img src="<?=$_SESSION['user_image_url'];?>" alt="<?=$_SESSION['user_image_url'];?>">
							<div>
								<p><?=$_SESSION['fname'];?><br><?=$_SESSION['lname'];?></p>
								<input type="text" name="created_on" placeholder="date" value="<?=date('M-d Y');?>" id="form_date">
								<input type="time" name="created_at" placeholder="time" value="<?=date('g:i a');?>">
							</div>
						</div>
						<input type="text" name="title" placeholder="title" value="tttt">
						<textarea name="contents" onfocus="if($(this).html() == 'Contents....') $(this).html('');">Contents....</textarea>
						<label for="fb">Share to Facebook</label>
						<input type="checkbox" onchange="fcheck();" value="fb" id="fb" name="facebook">
						<textarea id="fb_text" name="fb_text"></textarea>
						<label for="tw">Share to Twitter</label>
						<input type="checkbox" onchange="tcheck();" value="tw" id="tw" name="twitter">
						<textarea id="tw_text" name="tw_text"></textarea>
						<div id="link"><button type="button" onclick="add_url();" id="url_butt">Add Link</button></div>
						<input type="url" id="news_url" name="news_url" placeholder="News Url" value="http://www.google.com">
						<input type="submit" value="Submit!">
						<textarea id="fb_text"></textarea>
						<textarea id="tw_text"></textarea>
					</form>
				</div>
				<?
				break;
			default:
				$q['table'] = 'news';
				$q['where'] = "id='$this->pinfo'";
				$blog = $this->kSQL->select($q);
				if(!$blog) echo "No Blog Found!";
				else
				{
				?>
				<h1><?=$this->pinfo;?> <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="News Icon"></h1>
				<div id="mv_contents">
					<form id="form">
						<input type="hidden" name="action" value="update_blog">
						<input type="hidden" name="created_by_name" value="<?=$blog->created_by_name;?>">
						<input type="hidden" name="created_by_id" value="<?=$blog->created_by_id;?>">
						<input type="hidden" name="created_by_ip" value="<?=$blog->created_by_ip;?>">
						<div class="form_image">
							<a href="#" onclick="select_image();"><img src="<?=MY_KADMIN_URL;?>/media/images/addimage.png" alt="Add Image"></a>
						</div>
						<div class="select_image">
							<input type="url" name="image_url" placeholder="Image Url" value="http://www.google.com/images/errors/logo_sm.gif">
							<p>---OR---</p>
							<input type="file" name="image_file">
						</div>
						<div class="user_info">
							<img src="<?=$blog->author_image_url;?>" alt="">
							<div>
								<p><?=$blog->created_by_name;?></p>
								<input type="text" name="created_on" placeholder="date" value="<?=$blog->created_on;?>" id="form_date">
								<input type="time" name="created_at" placeholder="time" value="<?=$blog->created_at;?>">
							</div>
						</div>
						<input type="text" name="title" placeholder="title" value="<?=$blog->title;?>">
						<textarea name="contents"><?=$blog->contents;?></textarea>
						<label for="fb">Share to Facebook</label>
						<input type="checkbox" onchange="fcheck();" value="fb" id="fb" name="facebook">
						<textarea id="fbtext"></textarea>
						<label for="tw">Share to Twitter</label>
						<input type="checkbox" onchange="tcheck();" value="tw" id="tw" name="twitter">
						<textarea id="twtext"></textarea>
						<div id="link"><button type="button" onclick="add_url();" id="url_butt">Add Link</button></div>
						<input type="url" id="news_url" name="news_url" placeholder="News Url" value="http://www.google.com">
						<input type="submit" value="Submit!">
						<textarea id="fb_text"></textarea>
						<textarea id="tw_text"></textarea>
					</form>
				</div>
				<?
				}
				break;
		}
	$this->kScript->blog();
	$this->close_it_up();
	}


	public function events()
	{
		$this->authed_headers();
//		$this->kStyle->blog();

		switch($this->pinfo)
		{
			case "none":
				$site_users = $this->kSQL->selectret('users', null, 'fname');
//				echo "<div style='position: absolute; z-index: 3; top: 50%; left: 35%; background: blue; height: 200px; width: 200px; color; orange'>";
				$blog = $this->kSQL->selectret('blog', null, '*', null, "created_on DESC, created_at DESC");
//				echo "</div>";
				?>
				<h1>Events <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div class="events_home">
						<div class="entry_header"><div>Title</div><div>Author</div><div>Date</div></div>	
						<? 
							$this->kMod->events();
						?>
					</div>				
				</div>
				<?
				break;
			case "new":
				?>
				<h1>New Event for <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<form id="blog_form">
						<input type="hidden" name="action" value="new_blog">
						<input type="hidden" name="created_by_name" value="<? echo $_SESSION['fname'] . " " . $_SESSION['lname'];?>">
						<input type="hidden" name="created_by_id" value="<?=$_SESSION['uid'];?>">
						<input type="hidden" name="created_by_ip" value="<?=$_SESSION['ip'];?>">
						<input type="text" name="title" placeholder="title" value="tttt">
						<input type="url" name="news_url" placeholder="News Url" value="http://www.google.com">
						<input type="url" name="image_url" placeholder="Image Url" value="http://www.google.com/images/errors/logo_sm.gif">
						<input type="date" name="created_on" placeholder="date" value="today">
						<input type="time" name="created_at" placeholder="time" value="11:11pm">
						<textarea name="contents" onfocus="if($(this).html() == 'Contents....') $(this).html('');">Contents....</textarea>
						<input type="submit" value="Submit!">
					</form>
				</div>
				<?
				break;
			default:
				$blog = $this->kSQL->selectret('blog', 'id=' . $this->pinfo);
				if(!isset($blog['id'])) echo "No Blog Found!";
				?>
				<h1><?=$this->pinfo;?> <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<form id="blog_form">
						<input type="hidden" name="action" value="update_blog">
						<input type="hidden" name="blog_id" value="<?=$blog['id'];?>">
						<input type="text" name="created_by_name" value="<?=$blog['created_by_name'];?>">
						<input type="hidden" name="created_by_id" value="<?=$blog['created_by_id'];?>">
						<input type="hidden" name="created_by_ip" value="<?=$_SESSION['ip'];?>">
						<p>Created by Name: <?=$blog['created_by_name'];?></p>
						<p>Created by IP: <?=$blog['created_by_id'];?></p>
						<p>Created by ID: <?=$blog['created_by_ip'];?></p>
						<input type="text" name="title" placeholder="title" value="<?=$blog['title'];?>" disabled="disabled">
						<input type="url" name="news_url" placeholder="News Url" value="<?=$blog['news_url'];?>" disabled="disabled">
						<input type="url" name="image_url" placeholder="Image Url" value="<?=$blog['image_url'];?>" disabled="disabled">
						<input type="date" name="created_on" placeholder="date" value="<?=$blog['created_on'];?>" disabled="disabled">
						<input type="time" name="created_at" placeholder="time" value="<?=$blog['created_at'];?>" disabled="disabled">
						<textarea name="contents"  disabled="disabled"><?=$blog['contents'];?></textarea>
						<input type="button" onclick="blog_change(this);" value="Change Something">
						<input type="submit" id="subutt" value="Submit!" style="display: none;">
					</form>
				</div>
				<?
				break;
		}
	$this->kScript->blog();
	$this->close_it_up();
	}

	public function visits()
	{
	$this->authed_headers();
	$q['table'] = 'visits';
	function constraints($interval, $bot = 0)
	{
		$static = "ts > (NOW() - INTERVAL $interval) AND is_bot = $bot AND admin = 0";
		return $static;
	}
	$q['where'] = constraints("1 HOUR");
	$phour = $this->kSQL->counter($q);
	$q['where'] = constraints("1 HOUR", 1);
	$phourb = $this->kSQL->counter($q);
	$q['where'] = constraints("1 DAY");
	$pday = $this->kSQL->counter($q);
	$q['where'] = constraints("1 DAY", 1);
	$pdayb = $this->kSQL->counter($q);
	$q['where'] = constraints("1 WEEK");
	$pweek = $this->kSQL->counter($q);
	$q['where'] = constraints("1 WEEK", 1);
	$pweekb = $this->kSQL->counter($q);
	$q['where'] = constraints("1 MONTH");
	$pmonth = $this->kSQL->counter($q);
	$q['where'] = constraints("1 MONTH", 1);
	$pmonthb = $this->kSQL->counter($q);
	$q['where'] = constraints("1 YEAR");
	$pyear = $this->kSQL->counter($q);
	$q['where'] = constraints("1 YEAR", 1);
	$pyearb = $this->kSQL->counter($q);
	$q['where'] = "is_bot = 0 AND admin = 0";
	$ptotal = $this->kSQL->counter($q);
	$q['where'] = "is_bot = 1 AND admin = 0";
	$ptotalb = $this->kSQL->counter($q);
	?>
		<h1>Visits <?=MY_URL;?><img src="<?=MY_KADMIN_URL;?>/media/images/visitsicon.png" alt="Blog Icon"></h1>
		<div id="mv_contents">
			<div class="recent_visitors">
				<h3>Recent Visitors</h3>
				<p>Past Hour: <?=$phour . " / " . $phourb;?></p>
				<p>Past Day: <?=$pday . " / " . $pdayb;?></p>
				<p>Past Week: <?=$pweek . " / " . $pweekb;?></p>
				<p>Past Month: <?=$pmonth . " / " . $pmonthb;?></p>
				<p>Past Year: <?=$pyear . " / " . $pyearb;?></p>
				<p>Past Total: <?=$ptotal . " / " . $ptotalb;?></p>
			</div>
		</div>
	<?
	$this->close_it_up();
	}

	private function go_login()
	{
		header("Location:".MY_KADMIN_URL);
	}

}

?>