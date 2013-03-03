<?
function showPage($page, $more_info = null)
{
	global $domain_name;
	switch($page)
	{
		case "headers_unauthed":
			?>
				<html>
					<head>
						<title>KAdmin - <?=$domain_name;?></title>
				   	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
						<script type="text/javascript" src="script.js"></script>
						<link rel="stylesheet" type="text/css" href="style.css">
						<link rel="icon" type="image/png" href="favicon.png">
					</head>
					<body>
						<div id="sands"></div>
						<div id="pageholder">
							<img class="logo" src="kadminlogo.png" alt="KAdmin Logo">
							<form method="POST" onsubmit="login(); return false;" class="login-box">
								<h1>KAdmin Authentication</h1>
								<div id="login_status"><img src='progress.gif'></div>
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
		break;


		case "sands":
			$iam = "2083ur8903urREALL!!!!!sdlvn.";
			include('script.php');
			include('style.php');
			break;


		case "login_success";
			?>
				<p style="color:green">Login Successful!</p>
				<script type="text/javascript" >
					var myToken = '<?=$more_info;?>';
					$.ajax({
						url: "index.php",
						type: "POST",
						data:
						{
							my_token: myToken,
							req_info: 'sands'  
						},
						error: function(jqXHR, textStatus, errorThrown) { $('#login_status').html(textStatus + " - " + errorThrown); },
						success: function(data)
						{
							noticeBox = "<div id='notice'></div>";
							$('#sands').html(data);
							$('body').append(noticeBox);
							kAction('home');
						}
					});
				</script>
			<?
			break;


		case "login_invalid":
			?>
				<p style="color:red">Invalid Username/Password</p>
			<?
			break;


		case "login_fail":
			?>
				<p style="color:yellow">Something Went Wrong</p>
			<?
			break;


		case "home":
			welcome("admin-home");
			?>
				<b><a  id="link_home" onclick="kAction('home');">Home</a></b>
				<b><a  id="link_sands" onclick="kAction('sands');">Reload SandS</a></b>
				<img class="logo" src="kadminlogo.png" alt="KAdmin Logo">
				<nav>
					<ul>
						<li>
							<a href="#" onclick="kAction('mvShow', 'blog_home');">Blog <img src="blogicon.png" alt="Blog Icon"></a>
							<ul>
								<li><a href="#" onclick="kAction('newEntry', 'blog_new')">New Post</a></li>
								<li><a href="#" onclick="kAction('blogShow')">Show Posts</a></li>
							</ul>
						</li>
						<li>
							<a href="#" onclick="kAction('newsShow');">News <img src="newsicon.png" alt="Blog Icon"></a>
							<ul>
								<li><a href="#" onclick="kAction('newEntry', 'news_new')">New News</a></li>
								<li><a href="#" onclick="kAction('newsShow')">Show News</a></li>
							</ul>
						</li>
						<li>
							<a href="#" onclick="kAction('mvShow','visits_home');">Visits <img src="visitsicon.png" alt="Blog Icon"></a>
							<ul>
								<li><a href="#" onclick="kAction('visitsReal')">Real Visits</a></li>
								<li><a href="#" onclick="kAction('visitsCrawlers')">Crawlers</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<div id="main_viewer">
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
				</div>
			<?
			break;


		case "blog_new":
			?>
				<h1>New Blog Post <img src="blogicon.png" alt="Blog Icon"><a onclick="$('#new_entry').fadeOut(700);">X</a></h1>
				<form onsubmit="kAction('post_it', 'blog'); return false;" class="new-blog">
					<input type="text" placeholder="Post Title" id="new_post_title" tabindex="1">
					<input type="text" value="<?=date('F jS, Y');?>" id="new_post_date" tabindex="5" disabled="disabled">
					<input type="text" value="<?=date('g:i A');?>" id="new_post_time" tabindex="6" disabled="disabled">
					<div id="new_post_textarea_container">
						<textarea id="new_post_contents" tabindex="2"></textarea>
					</div>
					<input type="text" id="new_post_link" tabindex="3" placeholder="Relevant Link">
					<input id="new_post_post" type="submit" value="Post!" tabindex="4">
				</form> 
			<?
			break;


		case "news_new":
			?>
				<h1>New News Article <img src="newsicon.png" alt="Blog Icon"><a onclick="$('#new_entry').fadeOut(700);">X</a></h1>
				<form onsubmit="kAction('post_it', 'news'); return false;" class="new-blog">
					<input type="text" placeholder="Post Title" id="new_post_title" tabindex="1">
					<input type="text" value="<?=date('F jS, Y');?>" id="new_post_date" tabindex="4">
					<input type="text" value="<?=date('g:i A');?>" id="new_post_time" tabindex="5">
					<div id="new_post_textarea_container">
						<textarea id="new_post_contents" tabindex="2"></textarea>
					</div>
					<input type="text" id="new_post_link" tabindex="3" placeholder="Relevant Link">
					<input id="new_post_post" type="submit" value="Post!" tabindex="3">
				</form> 
			<?
			break;


		case "visits_home":
			$visits_past_24_real = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 24 HOUR) AND is_bot = 0", "COUNT(id)"); 				
			$visits_this_week_real = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 7 DAY) AND is_bot = 0", "COUNT(id)"); 				
			$visits_this_month_real = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 1 MONTH) AND is_bot = 0", "COUNT(id)"); 				
			$visits_this_year_real = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 1 YEAR) AND is_bot = 0", "COUNT(id)"); 				
			$visits_total_real = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 1 YEAR) AND is_bot = 0", "COUNT(id)"); 				
			$visits_past_24_crawler = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 24 HOUR) AND is_bot = 1", "COUNT(id)"); 				
			$visits_this_week_crawler = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 7 DAY) AND is_bot = 1", "COUNT(id)"); 				
			$visits_this_month_crawler = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 1 MONTH) AND is_bot = 1", "COUNT(id)"); 				
			$visits_this_year_crawler = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 1 YEAR) AND is_bot = 1", "COUNT(id)"); 				
			$visits_total_crawler = $mySql->selectret('visits', "ts > (NOW() - INTERVAL 1 YEAR) AND is_bot = 1", "COUNT(id)"); 				
			?>
				<script type="text/javascript" >
					var visits_this_week_real = '<?=$visits_this_week_real['COUNT(id)'];?>';
					var visits_this_month_real = '<?=$visits_this_month_real['COUNT(id)'];?>';
					var visits_this_year_real = '<?=$visits_this_year_real['COUNT(id)'];?>';
					var visits_this_week_crawler = '<?=$visits_this_week_crawler['COUNT(id)'];?>';
					var visits_this_month_crawler = '<?=$visits_this_month_crawler['COUNT(id)'];?>';
					var visits_this_year_crawler = '<?=$visits_this_year_crawler['COUNT(id)'];?>';

				</script>
				<div id="new_entry" style="display: none;"></div>
				<h1>Visits <?=$domain_name;?><img src="newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div id="visits_home">
						<h3>Your sites Visitors</h3>
						<div id="visits_past_24">Past 24 Hours: <span class="visits_real"><?=$visits_past_24_real['COUNT(id)'];?></span>/<span class="visits_crawler"><?=$visits_past_24_crawler['COUNT(id)'];?></span></div>
						<br>
						<div id="visits_past_whenever">Past 
							<select onchange="visitDuration();" id="visit_duration">
								<option value="week">week</option>
								<option value="month">month</option>
								<option value="year">year</option>
							</select>
							<div id="visit_duration_value"><span class="visits_real"><?=$visits_this_week_real['COUNT(id)'];?></span>/<span class="visits_crawler"><?=$visits_this_week_crawler['COUNT(id)'];?></span></div>
						</div>
						<div id="visits_key"><span class="visits_real">Real</span>/<span class="visits_crawler">Bot</span></div>
					</div>				
				</div>
			<?
			break;

		case "blog_list":
			$mySql = new sqlsesh();
			if($_POST['f_created_on_start'] != null) $created_on_start = mysql_escape_string($_POST['f_created_on_start']);
			else $created_on_start = 0;
			if($_POST['f_created_on_end'] != null) $created_on_end = mysql_escape_string($_POST['f_created_on_end']);
			else $created_on_end = "2199-12-21";
			$fwhere = "created_on >= '$created_on_start'	AND created_on <= '$created_on_end'";
			if($_POST['f_by_name'] != null) $fhwere .= " AND created_by_name LIKE '%" . $_POST['f_by_name'] . "%'";
			if($_POST['f_title'] != null) $fhwere .= " AND title LIKE '%" . $_POST['f_title'] . "%'";
			if($_POST['f_contents'] != null) $fhwere .= " AND contents LIKE '%" . $_POST['f_contents'] . "%'";
			$flimit = $_POST['f_limit_start'] . "," . $_POST['f_limit_num'];
			$forder = "created_on ASC, created_at DESC";
			$blogs = $mySql->selectret('blog', $fwhere, '*', $flimit, $forder);
			?>
				<div id="new_entry" style="display: none;"></div>
			<?
			foreach($blogs as $blog)
			{
			?>
				<div class="entry_list">
					<img src="<?=$blog['image_url'];?>">
					<p class="title"><?=$blog['title'];?></p>
					<p class="by"><?=$blog['created_by_name'];?></p>
					<p class="time"><?=$blog['created_at'];?></p>
					<p class="date"><?=$blog['created_on'];?></p>
				</div>
			<?
			}			
			break;

		case "blog_home":
			$mySql = new sqlsesh();
			$f_users = $mySql->selectret('users', null, 'fname');
			?>
				<div id="new_entry" style="display: none;"></div>
				<h1>Blogs <?=$domain_name;?><img src="newsicon.png" alt="Blog Icon"></h1>
				<div id="mv_contents">
					<div id="blog_home">
						<h3>Your sites Visitors</h3>
						<form onsubmit="kAction('blog', 'list'); return false;" class="new-blog">
							Created by:
							<select id="f_created_by" tabindex="1">
								<option value="*">All</option>
								<?
									foreach($f_users as $s_user)
									{
										echo "<option value='" . $s_user['fname'] . "'>" . $s_user['fname'] . "</option>";
									}
								?>
							</select>
							Title: <input type="text" id="f_title" tabindex="2">
							Created After:<input type="text" value="1900-01-01" id="f_created_on_start" tabindex="3">
							Created Before: <input type="text" value="<?=date('Y-m-d');?>" id="f_created_on_end" tabindex="4">
							Contains <input type="text" id="f_contents" tabindex="5">
							<input type="submit" value="Search" tabindex="6">
						</form>
					</div>				
				</div>
			<?
			break;
	}
}
?>