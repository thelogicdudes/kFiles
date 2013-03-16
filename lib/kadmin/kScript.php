<?
class kScript
{
private $kTools;
function __construct($script_type)
{
	global $kTools;
	$this->kTools = $kTools;
	if(isset($script_type))
	{
		switch($script_type)
		{
			case "login":
				$this->login();
				break;
			case "authed":
				$this->authed();
				break;
		}
	}
}

public function login()
{
?>
	<script type="text/javascript" >
	var MY_KADMIN_URL = '<?=MY_KADMIN_URL;?>';
	function login()
	{
		usr = $('#usremail').val();
		pass = $('#password').val();
		$.ajax({
			type: "POST",
			url: MY_KADMIN_URL,
			beforeSend: function()
			{
				$('#login_status').css("visibility", "visible");
				$('#login_status').html("<img src='<?=MY_KADMIN_URL;?>/style/images/progress.gif'>");
			},
			data:
			{
				action: "login",
				usremail: usr,
				password: pass
			},
			error: function(jqXHR, textStatus, errorThrown) { $('#login_status').html(textStatus + " - " + errorThrown); },
			success: function(data)
			{
				$('#login_status').html(data);
				if(data == "Success!") setTimeout(function(){ window.location = "<?=MY_KADMIN_URL;?>/authed"; }, 750);
			}
		});
	}
	$(document).ready(function()
	{
		$('#usremail').focus();
	});
	</script>
<?
}

public function authed()
{
?>
	<script type="text/javascript" >
		var MY_KADMIN_URL = '<?=MY_KADMIN_URL;?>';
		var locked = 1;
		var fb_auth = '<?=$this->kTools->fb_check(); ?>';
		
	function notification(msg, delay)
	{
		delay = typeof delay !== 'undefined' ? delay : 1000;
		msg = "<div onclick=\"$('#notification').css('display','none');\">x</div>" + msg;
		if(delay != 0)	$('#notification').html(msg).fadeIn(700).delay(delay).fadeOut(400);
		else	$('#notification').html(msg).fadeIn(700);
	}

	function logmeout()
	{
		$.ajax({
			type: "POST",
			url: MY_KADMIN_URL,
			data:
			{
				action: "logmeout",
				whoami: "<?=$_SESSION['uid'];?>"
			},
			success: function(data)
			{
				setTimeout(function(){ window.location = "<?=MY_KADMIN_URL;?>"; }, 250);
			}
		});
	}

	function form_change(me)
	{
		if(locked==1)
		{
			$('input').removeAttr('disabled');
			$('textarea').removeAttr('disabled');
			$('select').removeAttr('disabled');
			$(me).html("<img src='<?=MY_KADMIN_URL;?>style/images/unlock.png' alt='UnLocked'>");
			$('#subutt').fadeIn();
			$('#delbutt').fadeIn();
			locked = 0;
		}
		else
		{
			$('input').attr('disabled', 'disabled');
			$('textarea').attr('disabled', 'disabled');
			$('select').attr('disabled', 'disabled');
			$('button').attr('disabled', 'disabled');
			$(me).html("<img src='<?=MY_KADMIN_URL;?>style/images/lock.png' alt='UnLocked'>");
			$('#subutt').fadeOut();
			$('#delbutt').fadeOut();
			locked = 1;
		}
	}

		$(document).ready(function(){
			$('#a_form').submit(function(event) {
				$('input').removeAttr('disabled');
				$('textarea').removeAttr('disabled');
				$('select').removeAttr('disabled');
				var serializedData = $(this).serialize();
				$.ajax({
					url: MY_KADMIN_URL,
					type: "POST",
					data: serializedData
				})
				.done(function (response, textStatus, jqXHR){
					alert(response);
					window.location = MY_KADMIN_URL;
				})
				.fail(function (jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				});
				return false;
			});
		});


	function del_user(id, name)
	{
		var r=confirm("Are you sure you want to delete " + name + "?");
		if (r==true)
		{
	 		$.ajax({
				url: MY_KADMIN_URL,
				type: "POST",
				data:
				{
					action: 'del_user',
					user_id: id
				}
				})
				.done(function (response, textStatus, jqXHR){
					alert(response);
					window.location = (MY_KADMIN_URL + "users");
				});
		}
		else return false;
	}




	</script>
<?
}
public function visits()
{
?>
	<script type="text/javascript" >
	function visitDuration()
	{
		vd = $('#visit_duration').val();
		if(vd == 'week') vr = visits_this_week_real + "</span> / <span class='visits_crawler'>" + visits_this_week_crawler;
		if(vd == 'month') vr = visits_this_month_real + "</span> / <span class='visits_crawler'>" + visits_this_month_crawler;
		if(vd == 'year') vr = visits_this_year_real + "</span> / <span class='visits_crawler'>" + visits_this_year_crawler;
		$('#visit_duration_value').html("<span class='visits_real'>" + vr + "</span>");
	}	
	</script>
<?
}
public function blog()
{
?>
	<script type="text/javascript" >
	
		function blog_change(me)
		{
			$('input').removeAttr('disabled');
			$('textarea').removeAttr('disabled');
			$(me).fadeOut();$('#subutt').fadeIn();
		}

		function fcheck()
		{
			if(fb_auth == 1)
			{
				if($('#fb').is(':checked'))
				{
					$('#fb_text').removeAttr('disabled');
					$('#fb_text').css('display','block');
				}
				else 
				{
					$('#fb_text').attr('disabled','disabled');
					$('#fb_text').css('display','none');
				}
			}
			else
			{
				window.open('<? $this->kTools->fb_url(); ?>', '_blank', "height=500,width=1024,menubar=no,status=no,titlebar=no,toolbar=no,location=no");
			}
		}

		function tcheck()
		{
			if($('#tw').is(':checked'))
			{
				$('#tw_text').removeAttr('disabled');
				$('#tw_text').css('display','block');
			}
			else 
			{
				$('#tw_text').attr('disabled','disabled');
				$('#tw_text').css('display','none');
			}
		}

		function add_url()
		{
				$('#news_url').removeAttr('disabled');
				$('#news_url').css('display','block');
				$('#url_butt').css('display','none');
		}


		$(document).ready(function(){

			$('#image_upload').submit(function(event) {
			var fileData = new FormData();
			fileData.append('file', $( '#image_file' )[0].files[0] );
			fileData.append('action', "image_upload");
			fileData.append('forwhat', "blog");
				$.ajax({
					url: MY_KADMIN_URL,
					type: "POST",
					cache: false,
					contentType: false,
					processData: false,
					data: fileData
				})
				.done(function (response, textStatus, jqXHR){
					$('#image_url').val(response); 
					$('.select_image').fadeOut();
					var imgloc = "<img src='" + response + "'>";
					$('.form_image').html(imgloc);
				})
				.fail(function (jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				});
				return false;
			});




			$('#form').submit(function(event) {
			var serializedData = $('#form').serialize();
				$.ajax({
					url: MY_KADMIN_URL,
					type: "POST",
					data: serializedData
				})
				.done(function (response, textStatus, jqXHR){
					alert(response);
				})
				.fail(function (jqXHR, textStatus, errorThrown){
					alert(errorThrown);
				});
				return false;
			});
		});
	</script>
<?
}

}
?>