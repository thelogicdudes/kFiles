<?
	class kMod
	{
		private $kSQL;
		private $e_limit = 3;
		public $recent_blog;
	
		function __construct()
		{
			global $kSQL;
			$this->kSQL = $kSQL;
		}	

		public function event_dates()
		{
			$q['table'] = 'events';
			$q['where'] = 'the_date > NOW()';
			$q['limit'] = $this->e_limit;
			$q['order'] = "the_date ASC";
			$events = $this->kSQL->select($q);
			$now = date('Y-m-d');
			foreach($events as $event)
			{
				$e_date = strtotime($event->the_date);
				$int = $e_date - strtotime($now);
				$e_date = date('M-jS', $e_date);
				$e_title = $event->title;
				$int = ($int / (60 * 60 * 24));
				$int = number_format($int, 0);
				if($int == 0) $e_int = "Today!";
				elseif($int == 1) $e_int = "Tomorrow";
				elseif($int > 1 && $int <= 30) $e_int = "$int days away";
				elseif($int > 31)
				{
					$int = number_format(($int/30), 0);
					if($int == 1) $e_int = "a month away";
					if($int > 1) $e_int = "$int months away";
				}
				else $e_int = "NO! $int";
				echo "$e_date - $e_title - $e_int <br>"; 
			}
		}

		public function recent_tweets($n = 1)
		{
			$q['table'] = "tw_tweets";
			$q['limit'] = $n;
			$q['order'] = "id_str DESC";
			$tweets = $this->kSQL->select($q);
			echo "<p>" . $tweets->text . "</p><small><img src=\"" . $tweets->user_profile_image_url . "\" alt=\"" . $tweets->user_name . "\" height='32px' width='32px'><a target='_blank' href=\"https://twitter.com/" . $tweets->user_screen_name . "\">@" . $tweets->user_screen_name ."</a><br><time>" . $tweets->created_at . "</time></small>";
		}


		public function recent_blog($n = 1)
		{
			$q['table'] = "blog";
			$q['limit'] = $n;
			$q['order'] = "id DESC";
			$blog = $this->kSQL->select($q);
			if($blog->image_url != "") echo "<img src=\"" . $blog->image_url . "\">";
			echo "<h1>" . $blog->title . "</h1>";
			echo "<p>" . $blog->contents . "</p>";
			echo "<small>Posted by <img src=\"" . $blog->author_image_url . "\" alt=\"" . $blog->created_by_name . "\" height='32px' width='32px' ><a href=\"" . $blog->author_url . "\">" . $blog->created_by_name . "</a><br><time>" . $blog->created_at . "</time></small>";
		}

		public function recent_news($n = 1)
		{
			$q['table'] = "news";
			$q['limit'] = $n;
			$q['order'] = "id DESC";
			$news = $this->kSQL->select($q);
			echo "<a href=\"" . $news->news_url . "\" target='_blank'>";
			if($news->image_url != "") echo "<img src=\"" . $news->image_url . "\">";
			echo "<h1>" . $news->title . "</h1></a>";
			echo "<p>" . $news->contents . "</p>";
			echo "<small>Posted by <img src=\"" . $news->author_image_url . "\" alt=\"" . $news->created_by_name . "\" height='32px' width='32px' ><a href=\"" . $news->author_url . "\">" . $news->created_by_name . "</a><br><time>" . $news->created_at . "</time></small>";
		}

		public function lay($what)
		{
			switch($what)
			{
				case "recent_blog":
					$q['table'] = 'blog';
					$q['limit'] = '1';
					$q['order'] = 'id DESC';
					$this->recent_blog = $this->kSQL->select($q);
					break;
				default:
					echo "DEFAULT!";
					break;
			}
		}
	}
?>