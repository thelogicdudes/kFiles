<?

	class kStyle
	{
		function __construct($page)
		{
			$this->reseter();
			switch($page)
			{
				case "home":
					$this->home();
					break;
			}
		}

		/*************************************************/
		/*************************************************/
		/*********************MAIN************************/
		/*************************************************/
		/*************************************************/
		/*************************************************/
		public function reseter()
		{
			?>
<style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body
{
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}

*{
	margin: 0px;
	padding: 0px;
}
</style>
			<?
		}
		public function home()
		{
			?>
<style type="text/css">
/***********************HTML/BODY***********************/
html
{
	height: 100%;
}
body
{
	position: relative;
	width: 100%;
	min-height: 100%;
	height: auto !important;
	font-family: 'Exo', serif;
	font-size: 19px;
}
/***********************a, b, and more***********************/
b
{
	font-weight: bold;
}
p
{
	line-height: 24px;
}
/***********************DYNAMIC STYLING***********************/
/*iRatios*/
@media screen and (device-aspect-ratio: 2/3) /* iPhone < 5 */
{
	body
	{
		zoom: .667 !important;
	}
}
@media screen and (device-aspect-ratio: 40/71) /* iPhone 5 */
{
	body
	{
		zoom: .563 !important;
	}
}
@media screen and (device-aspect-ratio: 3/4) /* iPad (totally inferior to the nexus!)*/
{
	body
	{
		zoom: .75 !important;
	}
}

/***********Mobile Portrait***********/
@media all and (max-device-width: 1024px) and (orientation: portrait)
{
	body
	{
		background-color: gainsboro !important;
	}
	header.main
	{
		height: 150px;
		display: block;
	}
	#guts
	{
	}
	footer.mobile
	{
		width: 100%;
		display: block !important;
		background-color: paleturquoise !imporant;
	}
	p.slogan
	{
		width: 150px;
		margin: 11px 0;
	}
	a.logo
	{
		margin: 5px 9px;
	}
} 
/***********Mobile Landscape***********/
@media all and (max-device-width: 1024px) and (orientation: landscape)
{
	body
	{
		background-color: orangered !important;
	}
	header.main
	{
		position: absolute !important;
		top: 0;
		right: 0;
		bottom: 0;
		width: 150px;
	}
	#guts
	{
		margin-right: 150px;
		min-height: 350px;
	}
	div.spacer
	{
		margin-right: 150px;
		clear: none !important;
	}
	footer.mobile
	{
		display: inline !important;
		right: 150px !important;
	}
	div.nav_buttons
	{
		position: absolute;
		top: 285px;
		width: 150px;
		text-align: center;
		margin: 0 !important;
	}
	div.nav_buttons a
	{
		margin: 5px !important;
		padding: 15px 20px !important;
		display: inline-block;
		clear: both;		
	}
	p.slogan
	{
		width: 150px;
		margin: 11px 0;
	}
	a.logo
	{
		margin: 5px 9px;
	}
} 
/***********Desktops***********/
@media all and (min-device-width: 1025px)
{
	body
	{
		min-width: 1024px;
	}
	header.main
	{
		display: block;
		position: relative;
		height: 250px;
	}
	#guts
	{
	}
	div.spacer
	{
		height: 250px !important;
	}
	footer.main
	{
		display: block !important;
	}
	div.nav_buttons
	{
		position: relative;
		margin: 35px 11px !important;
	}
	div.nav_buttons a
	{
		margin: 5px !important;
		padding: 15px 20px !important;
		display: inline-block;
		clear: both;		
	}
	p.slogan
	{
		width: 150px;
		margin: 11px 25px;
	}
	a.logo
	{
		margin: 5px 9px;
	}
	div.social_buttons
	{
		width: 75% !important;
		margin: 0 auto !important;
	}
	section.main
	{
		display: inline-block !important;
		float: left;
		clear: left;
		padding: 11px;
		background-color: white;
		margin-bottom: 5px;
		width: 450px;
	}
	section.two
	{
		float: right !important;
		clear: none !important;
	}
	section.recent_posts
	{
		display: inline-block !important;
	}



} 
	
/***********************MAIN CONTROLS***********************/
body
{
background-color: blue;
}
div.wrapper
{
	position: absolute;
	left: 0;
	right: 0;
	display: block;
	min-height: 100%;
	height: auto !important;
}
header.main
{
	position: relative;
	background-color: black;
}
#guts
{
	position: relative;
	display: block;
	background-color: orangered;
	padding: 7px 5px;
}
#guts:after
{
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}
div.spacer
{
	position: relative;
	display: block;
	clear: both;
	height: 100px;
}
footer.mobile
{
	position: absolute;
	bottom: 0;
	left: 0;
	height: 100px;
	background-color: purple;
	display: none;
}
footer.main
{
	position: absolute;
	bottom: 0;
	left: 0;
	height: 250px;
	width: 100%;
	background-color: black;
	display: none;
}

/***********************HEADER***********************/
p.slogan
{
	float: left;
	color: white;
	text-align: center;
	font-weight: bold;
	font-size: 24px;
}
div.logo
{
	float: right;	
	margin-right: 5px;
	position: relative;
}
div.social_buttons
{
	position: relative;
	width: 100%;
	margin-top: 7px;
}
div.social_buttons a
{
	text-decoration: none;
	position: absolute;
	bottom: 0;
	width: 24px;
	height: 29px;
	text-align: center;
	line-height: 29px;
	font-weight: bold;
	font-size: 24px;
	border-radius: 5px;
}
div.social_buttons .f
{
	background-color: blue;
	left: 1px;
	color: red;
}
div.social_buttons .g
{
	background-color: red;
	left: 50%;
	margin-left: -16px;
	bottom: -13px !important;
	width: 32px !important;
	height: 25px !important;
	line-height: 15px !important;
	color: black;
}
div.social_buttons .t
{
	background-color: blue;
	right: 1px;
	color: white;
}
div.nav_buttons
{
	float: left;
	clear: left;
	margin: 15px 11px;
}
div.nav_buttons a
{
	background-color: orange;
	padding: 5px 11px;
	margin: 0 5px;
	text-decoration: none;
	color: black;
}
#twitter_box
{
	position: absolute;
	top: 9px;
	left: 250px;
	width: 400px;
	height: 75px;
	background-color: blue;
}
/***********************GUTS***********************/
section.main
{
	display: block;
	padding: 11px;
	background-color: white;
	margin-bottom: 5px;
}
section.main h1
{
	font-size: 21px;
	font-weight: bold;
	padding-bottom: 9px;
}
section.main p
{
	max-width: 100%;
}
section.recent_posts
{
	display: none;
	float: right;
	padding: 11px;
	background-color: black;
	margin-bottom: 5px;
	width: 450px;
	color: white;
}
section.recent_posts h1
{
	text-align: center;
}
/***********************FOOTER***********************/
footer.mobile p
{
	display: block;
	font-size: 31px;
	text-align: center;
	line-height: 42px;
	font-weight: bold;
}
footer.mobile p a
{
	background-color: orange;
	padding: 3px 11px;
	margin: 0 5px;
	text-decoration: none;
	color: black;
}
div.icons
{
	position: absolute;
	bottom: 35px;
	left: 50%;
	width: 1024px;
	margin-left: -512px;
	text-align: center;
}
div.icons a
{
	margin: 5px;
}
footer.main nav
{
	position: absolute;
	top: 25px;
	right: 35px;
}
div.contact_info
{
	position: absolute;
	top: 25px;
	left: 15px;
}
div.contact_info p
{
	color: white;
	line-height: 23px;
}
p.cright
{
	position: absolute;
	bottom: 5px;
	right: 5px;
	color: whitesmoke;
}
</style>
			<?
		}
	}
?>
