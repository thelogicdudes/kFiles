<?
class kStyle
{

function __construct($style_type)
{
	switch($style_type)
	{
		case "main":
			$this->main();
			break;
		case "authed":
			$this->main();
			$this->authed();
			break;
	}
}	


/******************************MAIN******************************/
public function main()
{
?>
<style type="text/css">
/*--STANDARDIZE THAT SHIT, YO!--*/
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
html
{
	height: 100%;
	min-height: 650px;
	min-width: 1200px;
}
body 
{
	position: relative;
	height: 100%;
}
@media all and (max-device-width : 320px) 
{
	body
	{
		zoom: .667 !important;
	}
} 
@media all and (max-width: 480px)
{
	body
	{
		width: 480px;
	}
} 

#pageholder
{
	position: relative;
	display: block;
	min-height: 100%;
	width: 100%;
}
@font-face
{
	font-family: BodyFont;
	src: url('fonts/Quattrocento_Sans/QuattrocentoSans-Regular.ttf'); 
}	
body
{
	background: #1e5799; /* Old browsers */
	background: -moz-linear-gradient(top, #1e5799 0%, #2989d8 55%, #207cca 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1e5799), color-stop(55%,#2989d8), color-stop(100%,#207cca)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #1e5799 0%,#2989d8 55%,#207cca 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #1e5799 0%,#2989d8 55%,#207cca 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #1e5799 0%,#2989d8 55%,#207cca 100%); /* IE10+ */
	background: linear-gradient(to bottom, #1e5799 0%,#2989d8 55%,#207cca 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#207cca',GradientType=0 ); /* IE6-9 */
}
.logo
{
	position: absolute;
	bottom: 25px;
	right: 35px;
}
.parent_logo
{
	position: absolute;
	bottom: 15px;
	left: 10px;
}
.login-box
{
	position: absolute;
	top: 15%;
	left: 50%;
	margin-left: -200px;
	width: 400px;
	height: 385px;
	border-radius: 11px;
	box-shadow: 0 0 5px black;
	background: rgb(181,189,200); /* Old browsers */
	background: -moz-linear-gradient(top, rgba(181,189,200,1) 0%, rgba(130,140,149,1) 35%, rgba(40,52,59,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(181,189,200,1)), color-stop(35%,rgba(130,140,149,1)), color-stop(100%,rgba(40,52,59,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 35%,rgba(40,52,59,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 35%,rgba(40,52,59,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 35%,rgba(40,52,59,1) 100%); /* IE10+ */
	background: linear-gradient(to bottom, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 35%,rgba(40,52,59,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b5bdc8', endColorstr='#28343b',GradientType=0 ); /* IE6-9 */	text-align: center;
}
.login-box h1
{
	text-align: center;
	padding: 11px;
	font-size: 23px;
	text-shadow: none;
	float: none;
}
.login-box input
{
	display: block;
	margin: 0 auto;
	text-align: center;
	width: 200px;
	height: 35px;
	font-size: 17px;
}
.login-box label
{
	position: absolute;
	left: 1px;
	width: 100px;
	text-align: center;
	margin-top: 13px;
}
.login-box input[type=submit]
{
	display: block;
	width: 80px;
	height: 40px;
	text-align: center;
	margin: 0 auto;
	color: white;
	font-size: 21px;
	border: 2px outset black;
	background: rgb(59,103,158); /* Old browsers */
	background: -moz-linear-gradient(top, rgba(59,103,158,1) 0%, rgba(43,136,217,1) 32%, rgba(32,124,202,1) 68%, rgba(125,185,232,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(59,103,158,1)), color-stop(32%,rgba(43,136,217,1)), color-stop(68%,rgba(32,124,202,1)), color-stop(100%,rgba(125,185,232,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 32%,rgba(32,124,202,1) 68%,rgba(125,185,232,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 32%,rgba(32,124,202,1) 68%,rgba(125,185,232,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 32%,rgba(32,124,202,1) 68%,rgba(125,185,232,1) 100%); /* IE10+ */
	background: linear-gradient(to bottom, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 32%,rgba(32,124,202,1) 68%,rgba(125,185,232,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3b679e', endColorstr='#7db9e8',GradientType=0 ); /* IE6-9 */
	border-radius: 5px;
}
.login-box input:focus
{
	box-shadow: 0 0 3px black;
}
.login-box input[type=submit]:hover
{
	box-shadow: 0 0 3px black;
}
.login-box input[type=submit]:active
{
	border: 2px inset black;
}
#login_status
{
	position: absolute;
	top: 60px;
	left: 50%;
	margin-left: -150px;
	width: 300px;
	height: 65px;
	visibility: hidden;	
}
#login_status p
{
	background: rgba(0,0,0,0.7);
	border-radius: 7px;
	padding: 7px;	
}
</style>
<?
}



/******************************AUTHED******************************/
public function authed()
{
?>
<style type="text/css">
#notice
{
	position: absolute;
	z-index: 99;
	padding: 11px;
	top: 15px;
	left: 50%;
	width: 200px;
	height: 75px;
	margin-left: -100px;
	display: none;
	background: green;
	color: black;
}
nav
{
	z-index: 99;
	position: absolute;
	top: 65px;
	left: 35px;
	box-shadow: 0 0 7px;
	border-radius: 7px;
}
nav li
{
	position: relative;
	width: 150px;
	height: 45px;
	text-align: center;
	border-bottom: 1px solid black;
	background: rgb(181,189,200); /* Old browsers */
	background: -moz-linear-gradient(left, rgba(181,189,200,1) 0%, rgba(130,140,149,1) 74%, rgba(119,138,142,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(181,189,200,1)), color-stop(74%,rgba(130,140,149,1)), color-stop(100%,rgba(119,138,142,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 74%,rgba(119,138,142,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 74%,rgba(119,138,142,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 74%,rgba(119,138,142,1) 100%); /* IE10+ */
	background: linear-gradient(to right, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 74%,rgba(119,138,142,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b5bdc8', endColorstr='#778a8e',GradientType=1 ); /* IE6-9 */
}
nav li:first-of-type
{
	border-top-left-radius: 7px;
	border-top-right-radius: 7px;
}
nav li:last-of-type
{
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
	border-bottom: none;
}
nav li:hover
{
	background: rgb(62,70,73); /* Old browsers */
	background: -moz-linear-gradient(left, rgba(62,70,73,1) 18%, rgba(130,140,149,1) 70%, rgba(181,189,200,1) 89%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(18%,rgba(62,70,73,1)), color-stop(70%,rgba(130,140,149,1)), color-stop(89%,rgba(181,189,200,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left, rgba(62,70,73,1) 18%,rgba(130,140,149,1) 70%,rgba(181,189,200,1) 89%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left, rgba(62,70,73,1) 18%,rgba(130,140,149,1) 70%,rgba(181,189,200,1) 89%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left, rgba(62,70,73,1) 18%,rgba(130,140,149,1) 70%,rgba(181,189,200,1) 89%); /* IE10+ */
	background: linear-gradient(to right, rgba(62,70,73,1) 18%,rgba(130,140,149,1) 70%,rgba(181,189,200,1) 89%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3e4649', endColorstr='#b5bdc8',GradientType=1 ); /* IE6-9 */
}
nav li:hover > ul
{
	display: block;
}
nav li:hover > a
{
	color: white;
}
nav a
{
	display: block;
	position: relative;
	text-decoration: none;
	color: black;
	line-height: 45px;
	font-size: 21px;
}
nav li ul
{
	display: none;
	position: absolute;
	left: 150px;
	top: 0;
}
nav li li
{
	margin-left: 10px;
	width: 125px;
	height: 35px;
}
nav li li a
{
	line-height: 35px;
	font-size: 19px;
}
nav img
{
	float: right;
	padding: 7px;
	height: 32px;
	width: 32px;
}
#main_viewer
{
	z-index: 10;
	position: absolute;
	top: 65px;
	left: 200px;
	right: 25px;
	bottom: 115px;
	background: rgba(0,0,0,0.7);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#cc000000, endColorstr=#cc000000);
	border-radius: 7px;
	box-shadow: 0 0 5px black;
}
#main_viewer p a
{
	text-decoration: none;
	color: white;
	text-shadow: 0 0 3px black;
}
#main_viewer p a:hover
{
	color: orangered;
}
#main_viewer h1
{
	display: block;
	color: white;
	font-size: 29px;
	line-height: 45px;
	text-align: center;
	text-shadow: 1px 1px 5px black;
	background: rgb(59,103,158); /* Old browsers */
	background: -moz-linear-gradient(left, rgba(59,103,158,1) 0%, rgba(43,136,217,1) 23%, rgba(32,124,202,1) 80%, rgba(125,185,232,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(59,103,158,1)), color-stop(23%,rgba(43,136,217,1)), color-stop(80%,rgba(32,124,202,1)), color-stop(100%,rgba(125,185,232,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 23%,rgba(32,124,202,1) 80%,rgba(125,185,232,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 23%,rgba(32,124,202,1) 80%,rgba(125,185,232,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 23%,rgba(32,124,202,1) 80%,rgba(125,185,232,1) 100%); /* IE10+ */
	background: linear-gradient(to right, rgba(59,103,158,1) 0%,rgba(43,136,217,1) 23%,rgba(32,124,202,1) 80%,rgba(125,185,232,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3b679e', endColorstr='#7db9e8',GradientType=1 ); /* IE6-9 */
	border-top-left-radius: 7px;	
	border-top-right-radius: 7px;	
}
#main_viewer h1 img
{
	float: left;
	padding-left: 7px;
	height: 45px; 
	width: 45px;
}
#main_viewer h2
{
	display: block;
	font-size: 23px;
	margin: 7px 7px 0 7px;
	padding: 17px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	margin-top: 25px;
}
#main_viewer p
{
	display: block;
	margin: 0 7px 7px 7px;
	line-height: 33px;
	border-bottom-left-radius: 5px;
	border-bottom-right-radius: 5px;
}
#mv_contents
{
	background: rgba(255,255,255,0.8);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#b2FFFFFF, endColorstr=#b2FFFFFF);
	position: absolute;
	top: 55px;
	left: 15px;
	right: 15px;
	bottom: 15px;
	border-radius: 5px;
}
#new_entry
{
	z-index: 90;
	position: absolute;
	top: 95px;
	left: 45px;
	right: 45px;
	bottom: 45px;
	border-radius: 5px;
	box-shadow: 0 0 5px black;
background-image: linear-gradient(left bottom, rgb(46,66,107) 0%, rgb(73,105,140) 100%);
background-image: -o-linear-gradient(left bottom, rgb(46,66,107) 0%, rgb(73,105,140) 100%);
background-image: -moz-linear-gradient(left bottom, rgb(46,66,107) 0%, rgb(73,105,140) 100%);
background-image: -webkit-linear-gradient(left bottom, rgb(46,66,107) 0%, rgb(73,105,140) 100%);
background-image: -ms-linear-gradient(left bottom, rgb(46,66,107) 0%, rgb(73,105,140) 100%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	right top,
	color-stop(0, rgb(46,66,107)),
	color-stop(1, rgb(73,105,140))
);
}
#new_entry h1 img
{
	float: left;
	padding-left: 7px;
	height: 45px; 
	width: 45px;
}
#new_entry h1 a
{
	float: right;
	padding-right: 11px;
	color: orange;
	font-size: 23px;
	text-shadow: 0 0 3px black;
	cursor: default;
}
#new_post_title
{
	position: absolute;
	top: 65px;
	left: 15px;
	width: 45%;
	height: 50px;
	font-size: 23px;
	text-align: center;
}
#new_post_date
{
	position: absolute;
	top: 55px;
	right: 25px;
	width: 150px;
	height: 25px;
	text-align: center;
}
#new_post_time
{
	position: absolute;
	top: 85px;
	right: 25px;
	width: 150px;
	height: 25px;
	text-align: center;
}
#new_post_textarea_container
{
	position: absolute;
	top: 130px;
	left: 7px;
	right: 7px;
	bottom: 95px;
}
#new_post_contents
{
	height: 100%;
	width: 100%;
	font-size: 17px;
}
#new_post_link
{	position: absolute;
	bottom: 55px;
	left: 25px;
	width: 150px;
	height: 25px;
	width: 400px;
}
#new_post_post
{
	position: absolute;
	bottom: 15px;
	width: 100px;
	height: 25px;
	left: 50%;
	margin-left: -50px;
}

.visits_crawler
{
	color: orange;
	display: inline-block;
}
.visits_real
{
	color: green;
	display: inline-block;
}

#visits_home h3
{
	position: absolute;
	top: 45px;
	width: 300px;
	margin-left: -150px;
	left: 50%;
	font-size: 27px;
}
#visits_key
{
	position: absolute;
	bottom: 15px;
	left: 15px;	
}
#visits_past_24
{
	position: absolute;
	top: 125px;
	left: 25px;
	font-size: 22px;	
}
#visits_past_whenever
{
	position: absolute;
	top: 125px;
	right: 25px;
	font-size: 22px;	
}
#visit_duration
{
	position: relative;
	top: -3px;
	width: 85px;
	text-align: center;
}
.list_row
{
	display: block !important;
}
.list_item
{
	width: 250px;
	display: inline-block;
	text-align: center;
}
a.list_link
{
	text-decoration: none;
	color: black;
}
a.list_link:hover
{
	color: orangered;
}
.lockunlock
{
	position: absolute;
	bottom: 5px;
	left: 5px;
}
#a_form
{
	text-align: center;
}
#a_form input
{
	width: 150px;
	text-align: center;
}
#a_form select
{
	text-align: center;
}
#a_form span
{
	position: relative;
	width: 150px;
	display: inline-block;
}
.user_controls
{
	position: absolute;
	top: 8px;
	right: 5px;
	width: 80px;
	background: rgb(31,31,81); /* Old browsers */
	background: -moz-linear-gradient(-45deg, rgba(31,31,81,1) 1%, rgba(24,45,24,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right bottom, color-stop(1%,rgba(31,31,81,1)), color-stop(100%,rgba(24,45,24,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(-45deg, rgba(31,31,81,1) 1%,rgba(24,45,24,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(-45deg, rgba(31,31,81,1) 1%,rgba(24,45,24,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(-45deg, rgba(31,31,81,1) 1%,rgba(24,45,24,1) 100%); /* IE10+ */
	background: linear-gradient(135deg, rgba(31,31,81,1) 1%,rgba(24,45,24,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1f1f51', endColorstr='#182d18',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */	
	border-radius: 11px;
	color: white;
	text-align: center;
}
.user_controls div
{
	position: absolute;
	height: 0;
	width: 80px;
	overflow: hidden;
	transition: height 1s;
	-moz-transition: height 1s;
	-o-transition: height 1s;
	-webkit-transition: height 1s;
	text-align: center;
}
.user_controls:hover > div
{
	height: 45px;
}
.user_controls a
{
	display: block;
	text-align: center;
}
div.blog_home
{
	position: absolute;
	top: 55px;
	width: 900px;
	left: 50%;
	margin-left: -450px;
}
#delbutt
{
	position: absolute;
	bottom: 8px;
	right: 15px;
	display: none;
	background-color: red;
	color: black;
	border: 1px outset;
}
#delbutt:hover
{
	border: 1px solid;
}
#delbutt:active
{
	border: 1px inset;
}

/**********************************************************************************/
</style>
<?
}
public function blog()
{
?>
<style type="text/css">
div.entry_header
{
	background-color: blueviolet;
	display: block;
}
div.entry_header div
{
	display: inline-block;
	width: 200px;
	text-align: center;
	color: orange;
}

div.form_image
{
	position: absolute;
	top: 0;
	left: -109px;
}
div.user_info
{
	position: absolute;
	top: 5px;
	right: -117px;
	width: 250px;
}
div.user_info div
{
	float: right;
	clear: right;
	width: 100px;
	margin: 0 auto;
	text-align: center;
}
div.user_info img
{
	float: right;
}
div.user_info p
{
	text-align: center;
	font-size: 17px;
	line-height: 21px;
}
div.user_info input
{
	position: relative;
	margin: 0 auto;
	width: 75px;
	display: block;
	height: 25px;
	text-align: center;
}
div.select_image
{
	position: absolute;
	z-index: 5;
	top: 25px;
	left: 50%;
	height: 200px;
	width: 350px;
	margin-left: -125px;
	display: none;
	background-color: gray;
}
#form
{
	position: absolute;
	right: 125px;
	left: 115px;
	height: 100%;
	margin: 0 auto;
}
#form input[name=title]
{
	width: 100%;
	height: 35px;
	margin: 15px auto;
	display: block;
	text-align: center;
	font-size: 23px;
}
#link
{
	position: absolute;
	left: 50%;
	margin-left: -100px;
	height: 36px;
	width: 200px;
}
#link button
{
	position: absolute;
	left: 50%;
	margin-left: -50px;
	margin-top: 15px;
	width: 100px;
	text-align: center;
}
#form input[name=news_url]
{
	display: none;
	position: absolute;
	width: 250px;
	left: 50%;
	margin-left: -125px;
	margin-top: 15px;
}
#form input[type=submit]
{
	display: block;
	margin: 65px auto;
	padding: 11px;
	
}
#form textarea[name=contents]
{
	width: 100%;
	height: 60% !important;
	margin: 0 auto;
	display: block;
}
#fb_text
{
	position: absolute;
	left: -75px;
	margin-top: 35px;
	width: 250px;
	height: 50px;
	display: none;
}
#tw_text
{
	position: absolute;
	right: -75px;
	margin-top: 35px;
	width: 250px;
	height: 50px;
	display: none;
}

label[for=fb]
{
	margin-left: -115px;
	float: left;
	padding: 15px;
}
#fb
{
	float: left;
	margin-top: 15px;
}
label[for=tw]
{
	margin-right: -115px;
	float: right;
	padding: 15px;
}
#tw
{
	float: right;
	margin-top: 15px;
}
</style>
<?
}
public function users()
{
?>
<style type="text/css">
.user_type_select
{
	position: absolute;
	top: 125px;
	left: 50%;
	width: 700px;
	margin-left: -350px;
}
.user_type_select a:hover
{
	background-color: gray;
}
</style>
<?
}
}
?>