<?
if($iam != "2083ur8903urREALL!!!!!sdlvn.") exit('This page is only available to authenticated users. Please login.');
?>
<script type="text/javascript" >
	function kAction(whatDo, whatWhat)
	{
		switch(whatDo)
		{
			case "home":
				$.ajax({
					url: "index.php",
					type: "POST",
					data:
					{
						my_token: myToken,
						req_info: "home"  
					},
					error: function(jqXHR, textStatus, errorThrown) { $('#login_status').html(textStatus + " - " + errorThrown); },
					success: function(data)
					{
						$('#pageholder').html(data);
						notice('welcome home :)');
					}
				});
				break;
			case "sands":
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
						$('#sands').html(data);
						notice('SandS had been reloaded');
					}
				});
				break;
			case "mvShow":
				$.ajax({
					url: "index.php",
					type: "POST",
					data:
					{
						my_token: myToken,
						req_info: whatWhat  
					},
					error: function(jqXHR, textStatus, errorThrown) { $('#login_status').html(textStatus + " - " + errorThrown); },
					success: function(data)
					{
						$('#main_viewer').html(data);
					}
				});
				break;
			case "newEntry":
				$.ajax({
					url: "index.php",
					type: "POST",
					data:
					{
						my_token: myToken,
						req_info: whatWhat  
					},
					error: function(jqXHR, textStatus, errorThrown) { $('#new_entry').fadeOut(); notice(textStatus + " - " + errorThrown); },
					success: function(data)
					{
						$('#new_entry').html(data).fadeIn(700);
						$('#new_post_title').focus();
					}
				});
				break;
			case "post_it":
				postTitle = $('#new_post_title').val();
				postDate = $('#new_post_date').val();
				postTime = $('#new_post_time').val();
				postContents = $('#new_post_contents').val();
				postLink = $('#new_post_link').val();
				postType = $('#post_type').val();
				$.ajax({
					url: "index.php",
					type: "POST",
					data:
					{
						my_token: myToken,
						post_type: whatWhat,
						new_post_title: postTitle,
						new_post_date: postDate,
						new_post_time: postTime,
						new_post_contents: postContents,
						new_post_link: postLink
					},
					error: function(jqXHR, textStatus, errorThrown) { notice("There was an error.<br>Please <a onclick=\"kAction('contact');\">contact Kevin</a><br>" + textStatus + " - " + errorThrown); },
					success: function(data)
					{
						notice(data);
						if(data != "There was an error.") $('#new_entry').fadeOut(700);
					}
				});
				break;
			case "blog":
				switch(whatWhat)
				{
					case "list":
						f_created_by = $('#f_created_by').val();
						f_title = $('#f_title').val();
						f_created_on_start = $('#f_created_on_start').val();
						f_created_on_end = $('#f_created_on_end').val();
						f_contents = $('#f_contents').val();
						$.ajax({
							url: "index.php",
							type: "POST",
							data:
							{
								my_token: myToken,
								req_info: 'blog_list',
								f_created_by: f_created_by,
								f_title: f_title,
								f_created_on_start: f_created_on_start,
								f_created_on_end: f_created_on_end,
								f_contents: f_contents,
								f_limit_start: '0',
								f_limit_num: '15'
							},
							error: function(jqXHR, textStatus, errorThrown) { $('#main_viewer').html(textStatus + " - " + errorThrown); },
							success: function(data)
							{
								$('#main_viewer').html(data);
							}
						});
				}
				break;
			
		}
	}
	function notice(whatSay)
	{
		$('#notice').html(whatSay).fadeIn().delay(4500).fadeOut();
	}	
	
	
	function visitDuration()
	{
		vd = $('#visit_duration').val();
		if(vd == 'week') vr = visits_this_week_real + "</span> / <span class='visits_crawler'>" + visits_this_week_crawler;
		if(vd == 'month') vr = visits_this_month_real + "</span> / <span class='visits_crawler'>" + visits_this_month_crawler;
		if(vd == 'year') vr = visits_this_year_real + "</span> / <span class='visits_crawler'>" + visits_this_year_crawler;
		$('#visit_duration_value').html("<span class='visits_real'>" + vr + "</span>");
	}	
	
</script>
