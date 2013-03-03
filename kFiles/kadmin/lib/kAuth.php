<?
	class kAuth
	{
		private $kSQL;
		function __construct()
		{
			global $kSQL;
			$this->kSQL = $kSQL;
		}
		public function login()
		{
			$usremail=mysql_escape_string($_POST['usremail']);
			$password=mysql_escape_string($_POST['password']) . MY_SALT;
			$password=md5($password);
			$q['table'] = 'users';
			$q['where'] = "usremail='$usremail' AND password='$password' and gid = '5'";
			$user = $this->kSQL->select($q);
			if($user) 
			{
				$id = $_SESSION['uid'] = $user->id;
				$gid = $_SESSION['gid'] = $user->gid;
				$name = $_SESSION['fname'] = $user->fname;
				$name = $_SESSION['lname'] = $user->lname;
				$_SESSION['user_image_url'] = $user->image_url;
				$_SESSION['user_url'] = $user->url;
				$avatar_url = $_SESSION['avatar_url'] = $user->avatar_url;
				$ip = $_SESSION['ip'] = ip2long($_SERVER['REMOTE_ADDR']);
				$sid = session_id();
				$q['table'] = 'sessions';
				$q['values'] = "active=0,comments='Logged out from $ip'";
				$q['where'] = "uid=$id AND active=1";
				$this->kSQL->update($q);
				$q=null;
				$q['table'] = 'sessions';
				$q['values'] = "'$sid', '$id', '$usremail', '$ip', NOW(), '1'";
				$q['rows'] = "sid,uid,usremail,uip,ts,active";
				$login = $this->kSQL->insert($q);
				if($login) return true;
				else return false;
			}
			else return false;
		}
		public function logmeout()
		{
				$id = $_SESSION['uid'];
				$q['table'] = 'sessions';
				$q['values'] = "active=0,comments='Logged out from page'";
				$q['where'] = "uid=$id AND active=1";
				$this->kSQL->update($q);
				session_destroy();
				$_SESSION['uid'] = null;
				$_SESSION['gid'] = null;
				$_SESSION['fname'] = null;
				$_SESSION['lname'] = null;
				$_SESSION['avatar_url'] = null;
				$_SESSION['ip'] = null;
		}
		public function verify()
		{
			$ip = ip2long($_SERVER['REMOTE_ADDR']);
			$sid = session_id();
			$q['table'] = 'sessions';
			$q['where'] = "sid = '$sid' AND uip = '$ip' AND ts > (NOW() - INTERVAL 2 HOUR) AND ACTIVE = 1";
			$test = $this->kSQL->select($q);
			if($test)
			{
				$q['values'] = "ts = NOW()";
				$update = $this->kSQL->update($q);	
				$uid = $test->uid;
				$q['table'] = 'users';
				$q['where'] = "id='$uid'";
				$user = $this->kSQL->select($q);
				if($user) 
				{
					$id = $_SESSION['uid'] = $user->id;
					$gid = $_SESSION['gid'] = $user->gid;
					$name = $_SESSION['fname'] = $user->fname;
					$name = $_SESSION['lname'] = $user->lname;
					$_SESSION['user_image_url'] = $user->image_url;
					$_SESSION['user_url'] = $user->url;
					return true;
				}
				else return false;
			}
			else return false;
		}			
	}
?>