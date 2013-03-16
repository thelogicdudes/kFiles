<?
	class kReceiver
	{
		private $hr;
		private $kSQL;
		private $kAuth;
		
		function __construct() 
		{
			$this->kAuth = new kAuth();
			global $kSQL;
			$this->kSQL = $kSQL;
			$action = $_POST['action'];
			session_start();
			if(!$this->kAuth->verify() && $action != "login") exit('Ah, Ah, Ah.');
			switch($action)
			{
				case "login":
					$this->login();
					break;
				case "image_upload":
					$this->image_upload();
					break;
				case "new_blog":
					$this->new_blog();
					break;
				case "update_blog":
					$this->update_blog();
					break;
				case "new_news":
					$this->new_news();
					break;
				case "update_news":
					$this->update_news();
					break;
				case "new_user":
					$this->new_user();
					break;
				case "update_user":
					$this->update_user();
					break;
				case "del_user":
					$this->del_user();
					break;
				case "logmeout":
					$this->logmeout();
					break;
				default:
					echo "Default";
					break;
			}
		}
		private function login()
		{
			$kAuth = new kAuth();
			$login = $kAuth->login();
			if($login)
			{
				echo "Success!";
			}
			else echo "Try Again!";
		}
		private function logmeout()
		{
			$kAuth = new kAuth();
			$logout = $kAuth->logmeout();
		}

		private function image_upload()
		{
			$forwhat = $_POST['forwhat'];
			if ($_FILES["file"]["error"] > 0)
			{
				$echo = "Error: " . $_FILES["file"]["error"] . "<br>";
				exit($echo);
			}
			else
			{
				$file_end = "style/images/" . $forwhat . "/";
				$file_loc = MY_ROOT . $file_end . $_FILES["file"]["name"];
				$jason = move_uploaded_file($_FILES["file"]["tmp_name"],$file_loc);
				$return = MY_PARENT_URL . $file_end . $_FILES["file"]["name"];
				if($jason) echo $return;
				else echo $file_loc;  
	      }
		}


		private function new_blog()
		{

			$post_keys = array("title", "contents", "created_by_name", "created_by_id", "created_by_ip", "image_url", "author_url", "author_image_url");
			$c = 0;
			foreach($post_keys as $key)
			{
				$entry[$c] = "\"" . mysql_escape_string($_POST[$key]) . "\""; 
				$c++;
			}
			if(isset($_POST['news_url']))
			{
				$entry[$c] = "\"" . $_POST['news_url'] . "\"";
				$post_keys[$c] = "news_url";
				$c++;
			}
			if($_POST['facebook'] == "fb")
			{
				$this->kTools->fb_post($_POST['fb_text']);
				$entry[$c] = "\"" . $_POST['fb_text'] . "\"";
				$post_keys[$c] = "fb_text";
				$c++;
				$echo .= "fb!";
			}
			if($_POST['twitter'] == "tw")
			{
				$this->kTools->tw_tweet($_POST['tw_text']);
				$entry[$c] = "\"" . $_POST['tw_text'] . "\"";
				$post_keys[$c] = "tw_text";
				$c++;
				$echo .= "tw!";
			}
			$post_keys[$c] = "created_on";
			$entry[$c] = "NOW()";
			$c++;
			$post_keys[$c] = "created_at";
			$entry[$c] = "NOW()";
			$q['table'] = "blog";
			$q['rows'] = implode(",", $post_keys);
			$q['values'] = implode(",", $entry);
			$post_the_post = $this->kSQL->insert($q);
			if($post_the_post) $echo .= "posted!";
			else $echo .= "NOT!!!";
			exit($echo);
		}
		
		private function update_blog()
		{
			$id = $_POST['blog_id'];
			$blog = $this->kSQL->selectret('blog', 'id='.$id);
			$post_keys = array("title", "created_on", "created_at", "contents", "news_url", "image_url", "created_by_name", "created_by_id", "created_by_ip");
			$c=0;
			foreach($post_keys as $key)
			{
				$entry[$c] = $blog[$key]; 
				$c++;
			}
			$entry[$c] = "NOW()";
			$c++;
			$entry[$c] = $id;
			$sql_keys = implode(",", $post_keys);
			$sql_keys .= ",ts,id";
			$post_the_post = $this->kSQL->insert('old_blog', $entry, $sql_keys);

			foreach($post_keys as $key)
			{
				$updates[$key] = mysql_escape_string($_POST[$key]); 
			}
			$post_the_post = $this->kSQL->update('blog', $updates, "id=".$id);
			if($post_the_post) exit('Blog has been updated');
			else exit('There was an error.');
		}

		private function new_news()
		{

			$post_keys = array("title", "contents", "created_by_name", "created_by_id", "created_by_ip", "image_url", "author_url", "author_image_url");
			$c = 0;
			foreach($post_keys as $key)
			{
				$entry[$c] = "\"" . mysql_escape_string($_POST[$key]) . "\""; 
				$c++;
			}
			if(isset($_POST['news_url']))
			{
				$entry[$c] = "\"" . $_POST['news_url'] . "\"";
				$post_keys[$c] = "news_url";
				$c++;
			}
			if($_POST['facebook'] == "fb")
			{
				$this->kTools->fb_post($_POST['fb_text']);
				$entry[$c] = "\"" . $_POST['fb_text'] . "\"";
				$post_keys[$c] = "fb_text";
				$c++;
				$echo .= "fb!";
			}
			if($_POST['twitter'] == "tw")
			{
				$this->kTools->tw_tweet($_POST['tw_text']);
				$entry[$c] = "\"" . $_POST['tw_text'] . "\"";
				$post_keys[$c] = "tw_text";
				$c++;
				$echo .= "tw!";
			}
			$post_keys[$c] = "created_on";
			$entry[$c] = "NOW()";
			$c++;
			$post_keys[$c] = "created_at";
			$entry[$c] = "NOW()";
			$q['table'] = "news";
			$q['rows'] = implode(",", $post_keys);
			$q['values'] = implode(",", $entry);
			$post_the_post = $this->kSQL->insert($q);
			if($post_the_post) $echo .= "posted!";
			else $echo .= "NOT!!!";
			exit($echo);
		}
		
		private function update_news()
		{
			$id = $_POST['blog_id'];
			$blog = $this->kSQL->selectret('news', 'id='.$id);
			$post_keys = array("title", "created_on", "created_at", "contents", "news_url", "image_url", "created_by_name", "created_by_id", "created_by_ip");
			$c=0;
			foreach($post_keys as $key)
			{
				$entry[$c] = $blog[$key]; 
				$c++;
			}
			$entry[$c] = "NOW()";
			$c++;
			$entry[$c] = $id;
			$sql_keys = implode(",", $post_keys);
			$sql_keys .= ",ts,id";
			$post_the_post = $this->kSQL->insert('old_blog', $entry, $sql_keys);

			foreach($post_keys as $key)
			{
				$updates[$key] = mysql_escape_string($_POST[$key]); 
			}
			$post_the_post = $this->kSQL->update('blog', $updates, "id=".$id);
			if($post_the_post) exit('Blog has been updated');
			else exit('There was an error.');
		}

		private function new_user()
		{
			$post_keys = array("created_by_name","created_by_id", "gid", "fname", "lname", "usremail", "password");
			$c = 0;
			foreach($post_keys as $key)
			{
				$entry[$c] = "\"" . mysql_escape_string($_POST[$key]) . "\""; 
				$c++;
			}
			$post_keys[$c] = "created_on";
			$entry[$c] = "NOW()";
			$c++;
			$post_keys[$c] = "created_at";
			$entry[$c] = "NOW()";
			$q['table'] = "users";
			$q['rows'] = implode(",", $post_keys);
			$q['values'] = implode(",", $entry);
			$post_the_post = $this->kSQL->insert($q);
			$name = $_POST['fname']  . ' has been created';
			if($post_the_post) exit($name);
			else exit('There was an error...');
		}

		private function update_user()
		{
			$id = $_POST['user_id'];
			$q['table'] = 'users';
			$q['where'] = "id = '$id'";
			$postpassword = $_POST['password'];
			if($postpassword == "Not Changed" || $postpassword == "") $password = "";
			else
			{
				$postpassword.= MY_SALT;
				$postpassword=md5($postpassword);
				$password = ", password='$postpassword'";
			}
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$gid = $_POST['gid'];
			$q['values'] = "fname = '$fname', lname = '$lname', usremail = '$email', gid = '$gid' $password"; 
			if($this->kSQL->update($q)) echo "Yay!";
			else echo "Nooo";
		}
		private function del_user()
		{
			$id = $_POST['user_id'];
			$q['table'] = 'users';
			$q['where'] = "id = '$id'";
			$del = $this->kSQL->delete($q);
			if($del) echo "User Deleted!";
			else echo "There was an error. Please try again.";
		}
	}
?>