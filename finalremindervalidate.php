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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textarea'])) {
  $loginUsername=$_POST['textarea'];
  $password=$_POST['textarea2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "finalreminderpidprint.html";
  $MM_redirectLoginFailed = "validate2.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_amac_connection, $amac_connection);
  
  $LoginRS__query=sprintf("SELECT username, password FROM registration WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $amac_connection) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AMAC</title>
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
<div id="wrapper">
  <div class="header2">
    <div class="logo"><img src="images/alain logo.jpg" alt="" width="180" height="168" /></div>
    <div class="headertext"><span class="headertext2">Abuja Municipal Area Council [AMAC]</span></div>
  </div>
  <div id="page" class="container">
  <div class="mainpholder"></div>
  <div class="navbar">
    <ul id="MenuBar1" class="MenuBarVertical">
      <li><a href="index.html"></a></li>
      <li></li>
      <li><a href="logout.html">Logout</a></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <div id="content">
    <div class="post">
      <div class="entry">
        <p><strong>NOTE: </strong>This page has restricted access. To  insert data, please contact the adminstrators for admittance.</p>
<p>LOGIN TO INSERT DATA</p>
        <form ACTION="<?php echo $loginFormAction; ?>" id="form1" method="POST">
          <p>User Name:
            <label for="textarea"></label>
            <input name="textarea" type="text" id="textarea" value="" size="45" />
          </p>
          <p>&nbsp;Password:
            <label for="textarea2"></label>
            <input name="textarea2" type="password" id="textarea2" value="" size="45" />
          </p>
          <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="button" id="button" value="Login" /></p></form></div>
    </div>
  </div>
  <!-- end #content -->
  <!-- end #sidebar -->
</div>
<!-- end #page --> 
</div>
<div class="partnersholder">
  <div class="mainpholder"></div>
</div>
<div id="footer">
  <p>© 2013 All rights reserved.</p>
</div>
<!-- end #footer -->
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>