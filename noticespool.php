


<?php 	
	$host = "localhost";
	$user = "root";
	$password = '';
	$db_name = "amac";
	
	$con = mysqli_connect($host, $user, $password, $db_name);
	if(mysqli_connect_errno()) {
		die("Failed to connect with MySQL: ". mysqli_connect_error());
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel Uploading PHP</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style1 {color: #000000}
.style2 {
	font-size: 18px;
	padding: 50px;
}
body {
	background-color: #FFF;
}
.style3 {
	color: #8A8985
}
.header {
	background-image: url(images/img02.jpg);
	height: 180px;
	width: auto;
	padding-right: 84px;
	padding-left: 84px;
	padding-bottom: 12px;
	margin-right: auto;
	margin-left: auto;
	position: relative;
}
.logoholder {
	height: 300px;
	width: 300px;
	padding-left: 168px;
}
.logo {
	height: 300px;
	width: 300px;
}
.headertext {
}
.logo {
	height: 300px;
	width: 300px;
}
.logo {
	float: left;
	height: 168px;
	width: 180px;
	padding-left: 0px;
}
.headertext {
	height: 250px;
	width: auto;
	float: none;
	color: #FFF;
	font-size: 55px;
	padding-top: 90px;
	clear: none;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	font-weight: bold;
}
.style21 {font-size: 2.5em}
.navbar {
	float: left;
	width: 200px;
}
-->
</style>
<link href="media/css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
	<link href="media/css/highlight.black.css" type="text/css" media="all" rel="stylesheet" />
	<link href="media/css/sexy-bookmarks-style.css" type="text/css" media="all" rel="stylesheet" />
	
	<script src="media/js/jquery-1.6.3.min.js"></script>
	<script src="media/js/jquery.easing.1.3.js"></script>
	<script src="media/js/jquery.animate-colors-min.js"></script>
	
	<script src="media/js/jquery.skitter.min.js"></script>
	<script src="media/js/highlight.js"></script>
	<script src="media/js/sexy-bookmarks-public.js"></script>
	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<script>
	$(document).ready(function() {
		
		var options = {};
	
		if (document.location.search) {
			var array = document.location.search.split('=');
			var param = array[0].replace('?', '');
			var value = array[1];
			
			if (param == 'animation') {
				options.animation = value;
			}
			else if (param == 'type_navigation') {
				if (value == 'dots_preview') {
					$('.border_box').css({'marginBottom': '40px'});
					options['dots'] = true;
					options['preview'] = true;
				}
				else {
					options[value] = true;
					if (value == 'dots') $('.border_box').css({'marginBottom': '40px'});
				}
			}
		}
		
		$('.box_skitter_large').skitter(options);
		
		// Highlight
		$('pre.code').highlight({source:1, zebra:1, indent:'space', list:'ol'});
		
	});
	</script>


<style type="text/css">
body,td,th {
	font-family: "Open Sans Condensed", sans-serif;
	width: auto;
}
.mediaholder {
	height: 300px;
	width: auto;
	padding-right: 0px;
	padding-left: 0px;
	border: 0px solid #ccc;
	float: none;
}
.mainmedia {
	height: 300px;
	width: 972px;
	padding-left: 0px;
	float: left;
	border-top-width: 0px;
	border-right-width: 10px;
	border-bottom-width: 10px;
	border-left-width: 10px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #0B5F07;
	border-right-color: #0B5F07;
	border-bottom-color: #0B5F07;
	border-left-color: #0B5F07;
}
.null1 {
	float: left;
	height: 300px;
	width: 292px;
}
.partnersholder {
	height: 86px;
	width: auto;
	background-color: #FFF;
	padding-right: 0px;
	border: 0px solid #0B5F07;
	margin-right: auto;
	margin-left: auto;
	position: relative;
}
.null2 {
	float: left;
	height: 76px;
	width: 300px;
}
.mainpholder {
	height: 76px;
	width: 972px;
	border: 10px solid #0B5F07;
	float: none;
	margin-right: auto;
	margin-left: auto;
	position: relative;
}
#apDiv1 {
	position:absolute;
	width:573px;
	height:166px;
	z-index:1;
	left: 723px;
	top: 667px;
}
#apDiv2 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	width:830px;
	height:195px;
	z-index:1;
	left: -155px;
	top: -393px;
}
</style>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.header1 {	background-image: url(images/img02.jpg);
	height: 180px;
	width: auto;
	position: relative;
	margin-right: auto;
	margin-left: auto;
	float: none;
	padding-left: 40px;
}
.headertext1 {}
.headertext1 {	height: 250px;
	width: auto;
	float: none;
	color: #FFF;
	font-size: 62px;
	padding-top: 90px;
	clear: none;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	font-weight: bold;
}
.header2 {	background-image: url(images/img02.jpg);
	height: 180px;
	width: auto;
	position: relative;
	margin-right: auto;
	margin-left: auto;
	float: none;
	padding-left: 10px;
	padding-right: 10px;
}
.headertext2 {}
.headertext2 {height: 250px;
	width: auto;
	float: none;
	color: #FFF;
	font-size: 55px;
	padding-top: 90px;
	clear: none;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	font-weight: bold;
}
</style>
</head>
<body>

<div class="container">
	<h1>Notice Spool</h1>

	<form method="POST" action="bulk.php" enctype="multipart/form-data">
		<div class="form-group">
			<label>Spool Pid Excel File</label>
			<input type="file" name="file" id="file" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-success">Spool Notice</button>
		</div>
		
	</form>
</div>

</body>
</html>

