<?

	class kScript
	{
		function __construct($page)
		{
			switch($page)
			{
				case "main":
					$this->main();
					break;
			}
		}

		/*************************************************/
		/*************************************************/
		/*********************MAIN************************/
		/*************************************************/
		/*************************************************/
		/*************************************************/
		public function main()
		{
		?>
<script type="text/javascript" >

	var myURL = '<?=MY_URL;?>';

	$(document).ready(function(){
		$('#contact_form').submit(function(event) {
			var serializedData = $(this).serialize();
			$.ajax({
				url: myURL,
				type: "post",
				data: serializedData
			})
			.done(function (response, textStatus, jqXHR){
				responseCode = response.substr(0,1);
				responseMsg = response.substr(1);
				switch(responseCode)
				{
					case "1":
						window.scrollTo(0, 0);
						notification(responseMsg);
						setTimeout(function(){ window.location = myURL; }, 1500);
						break;
					case "2":
						window.scrollTo(0, 0);
						notification(responseMsg,10000);
						break;
					default:
						alert('default');
						break;
				}
			})
			.fail(function (jqXHR, textStatus, errorThrown){
				notification("There was a problem. Please email <a href='mailto:webmaster@businessadvisors.pro'>webmaster@businessadvisors.pro</a> or call (407) 477-4284", 10000);
			});
			return false;
		});
	});


	function notification(msg, delay)
	{
		delay = typeof delay !== 'undefined' ? delay : 1000;
		msg = "<div onclick=\"$('#notification').css('display','none');\">x</div>" + msg;
		$('#notification').html(msg).fadeIn(700).delay(delay).fadeOut(400);
	}



</script>
		<?
		}
	}
?>