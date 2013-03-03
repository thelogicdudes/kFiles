function login()
{
	usr = $('#usremail').val();
	pass = $('#password').val();
	$.ajax({
		type: "POST",
		url: "http://tbusinessadvisors.pro/admin/index.php",
		beforeSend: function()
		{
			$('#login_status').css("visibility", "visible");
			$('#login_status').html("<img src='progress.gif'>555");
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
			setTimeout(function(){ window.location = "})
		}
		});
}
$(document).ready(function()
{
	$('#usremail').focus();
});


