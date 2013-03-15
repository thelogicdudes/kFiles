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
			$q['order'] = "created_at ASC";
			$tweets = $this->kSQL->select($q);
			echo "<p>" . $tweets->text . "</p><small><img src=\"" . $tweets->user_image_url . "\" alt=\"" . $tweets->user_name . "\" height='32px' width='32px'><a href=\"https://twitter.com/" . $tweets->user_screen_name . "\">" . $tweets->user_screen_name ."</a><br><time>" . $tweets->created_at . "</time></small>";
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