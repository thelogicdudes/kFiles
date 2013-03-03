<?
if(IAM != "2083ur8903urREALL!!!!!sdlvn.") exit('This page is only available to authenticated users. Please login.');
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

#link_home, #link_sands
{
	position: absolute;
	top: 15px;
	color: orange;
	text-shadow: 0 0 1px black;
	font-size: 17px;
	cursor: pointer;
}
#link_home
{
	left: 5px;
}
#link_sands
{
	right: 5px;
}
#link_home:hover, #link_sands:hover
{
	color: orangered;
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
background-image: linear-gradient(left bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);
background-image: -o-linear-gradient(left bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);
background-image: -moz-linear-gradient(left bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);
background-image: -webkit-linear-gradient(left bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);
background-image: -ms-linear-gradient(left bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);

background-image: -webkit-gradient(
	linear,
	left bottom,
	right top,
	color-stop(0.29, rgb(211,221,237)),
	color-stop(0.9, rgb(119,138,153))
);


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



background-image: linear-gradient(right bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);
background-image: -o-linear-gradient(right bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);
background-image: -moz-linear-gradient(right bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);
background-image: -webkit-linear-gradient(right bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);
background-image: -ms-linear-gradient(right bottom, rgb(211,221,237) 29%, rgb(119,138,153) 90%);

background-image: -webkit-gradient(
	linear,
	right bottom,
	left top,
	color-stop(0.29, rgb(211,221,237)),
	color-stop(0.9, rgb(119,138,153))
);



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
	border-radius: 7px;
	box-shadow: 0 0 5px black;
}
#main_viewer a
{
	text-decoration: none;
	color: white;
	text-shadow: 0 0 3px black;
}
#main_viewer a:hover
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
background-image: linear-gradient(left top, rgb(0,78,194) 29%, rgb(4,70,120) 90%);
background-image: -o-linear-gradient(left top, rgb(0,78,194) 29%, rgb(4,70,120) 90%);
background-image: -moz-linear-gradient(left top, rgb(0,78,194) 29%, rgb(4,70,120) 90%);
background-image: -webkit-linear-gradient(left top, rgb(0,78,194) 29%, rgb(4,70,120) 90%);
background-image: -ms-linear-gradient(left top, rgb(0,78,194) 29%, rgb(4,70,120) 90%);

background-image: -webkit-gradient(
	linear,
	left top,
	right bottom,
	color-stop(0.29, rgb(0,78,194)),
	color-stop(0.9, rgb(4,70,120))
);
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
	padding: 17px;
	display: block;
	margin: 0 7px 7px 7px;
	font-size: 19px;
	line-height: 33px;
	border-bottom-left-radius: 5px;
	border-bottom-right-radius: 5px;
}
#main_viewer div:
{
	display: inline-block;
}
#mv_contents
{
	background: rgba(255,255,255,0.8);
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










</style>

