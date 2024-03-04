<?php require_once('Connections/amac_connection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO registration (name, `staff no`, department, username, password) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['staffno.'], "text"),
                       GetSQLValueString($_POST['department'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_amac_connection, $amac_connection);
  $Result1 = mysql_query($insertSQL, $amac_connection) or die(mysql_error());

  $insertGoTo = "success.html";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="Alain,Aba shoes,Nigerian shoes" />
<meta name="description" content="The Association of Leather/Allied of Industrialists of Nigeria (ALAIN) was formed in 1991 as the only national and umbrella body for the leather/allied goods manufacturers in Nigeria." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AMAC</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style1 {color: #000000}
.style2 {
	font-size: 2.4em;
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
	height: auto;
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
	position: absolute;
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
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
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
	margin-right: auto;
	margin-left: auto;
	position: relative;
}
.mainmedia {
	height: 300px;
	width: 972px;
	padding-left: 0px;
	float: none;
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
	margin-right: auto;
	margin-left: auto;
	position: relative;
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
.headertext2 {}
.headertext2 {	height: 250px;
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
</style>
</head>
<body>
<div id="wrapper">
  <div class="header2">
    <div class="logo"><img src="images/alain logo.jpg" alt="" width="180" height="168" /></div>
    <div class="headertext2"> Abuja Municipal Area Council [AMAC]</div>
  </div>
  <div class="mediaholder">
<div class="mainmedia"><div class="box_skitter box_skitter_large">
				<ul>
					<li><a href="#cube"><img src="media/images/001.jpg" class="cube" /></a><div class="label_text"><p>Raw Materials</p></div></li>
					<li><a href="#cubeRandom"><img src="media/images/002.jpg" class="cubeRandom" /></a><div class="label_text"><p>Raw Materials</p></div></li>
					<li><a href="#block"><img src="media/images/003.jpg" class="block" /></a><div class="label_text"><p>Raw Materials</p></div></li>
					<li><a href="#cubeStop"><img src="media/images/004.jpg" class="cubeStop" /></a><div class="label_text"><p>Finished Leather Goods</p></div></li>
					<li><a href="#cubeHide"><img src="media/images/005.jpg" class="cubeHide" /></a><div class="label_text"><p>Finished Leadther Goods</p></div></li>
                    <li><a href="#cubeSize"><img src="media/images/006.jpg" class="cubeSize" /></a><div class="label_text"><p>Finished Leather Goods</p></div></li>
					<li><a href="#horizontal"><img src="media/images/007.jpg" class="horizontal" /></a><div class="label_text"><p>Packaging and Distribution</p></div></li>
				  <li><a href="#showBars"><img src="media/images/008.jpg" class="showBars" /></a><div class="label_text"><p>Packaging and Distribution</p></div></li>			
				</ul>
			</div></div>
</div>

<div id="page" class="container">
<p></p>
  <div class="navbar">
    <ul id="MenuBar1" class="MenuBarVertical">
      <li></li>
      <li></li>
      <li></li>
      <li><a href="index.html"></a></li>
      <li><a href="logout.html">Logout</a></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
<li></li>
<li></li>
<li></li>
    </ul>
    <p>&nbsp;</p>
</div>
  <div id="content">
    <div class="post">
      <h2 class="title"><a href="#">Registration</a></h2>
      <div class="entry">
        <form name="form1" id="form1" method="POST" action="<?php echo $editFormAction; ?>">
          <p>
            <label for="name">Name</label>
            :
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="name" type="text" id="name" size="30" maxlength="20" />
          </p>
          <p>
            <label for="staffno.">Staff No.:</label>
           &nbsp;&nbsp;&nbsp;&nbsp; <input name="staffno." type="text" id="staffno." size="30" />
          </p>
          <p>
            <label for="department">Department:</label>
            <input name="department" type="text" id="department" size="30" />
          </p>
          <p>
            <label for="username">Username:</label>
            &nbsp;&nbsp;<input name="username" type="text" id="username" size="30" />
          </p>
          <p>
            <label for="password">Password:</label>
            &nbsp;&nbsp;<input name="password" type="text" id="password" size="30" />
          </p>
          <p>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="register" id="register" value="Submit" />
          </p>
          <input type="hidden" name="MM_insert" value="form1" />
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
</div>
    </div>
  </div>
  <!-- end #content -->
  <!-- end #sidebar -->
</div>
<!-- end #page --> 
</div>
<div class="partnersholder">
  <div class="mainpholder"><div class="box_skitterfooter box_skitter_large">
				<ul>
					<li><a href="http://www.rfidresearchcentre.org.ng"><img src="images/slide2.jpg" class="cube" /></a><div class="label_text"><p>Raw Materials</p></div></li>
				  <li><a href="http://www.businessdayonline.com"><img src="images/slide3.jpg" class="cube" /></a><div class="label_text">
				    <p>Raw Materia</p></div></li>
		  </ul>
  </div></div>
  <div id="footer">
    <p>© 2013 All rights reserved.</p>
  </div>
</div>
<!-- end #footer -->
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
