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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE notice SET full_name=%s, address=%s, street_code=%s, rate_year=%s, cadastral_zone=%s, property_address=%s, property_use=%s, rating_district=%s, assessement_no=%s, annual_value=%s, rate_nairage=%s, rate_payable=%s, arrears=%s, arrears_year=%s, penalty=%s, previous_balance=%s, grand_total=%s, remark=%s WHERE pid=%s",
                       GetSQLValueString($_POST['textfield'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['street_code'], "text"),
                       GetSQLValueString($_POST['rate-year'], "text"),
                       GetSQLValueString($_POST['cadastral_zone'], "text"),
                       GetSQLValueString($_POST['property_address'], "text"),
                       GetSQLValueString($_POST['use_property'], "text"),
                       GetSQLValueString($_POST['rating_district'], "text"),
                       GetSQLValueString($_POST['assesment_no'], "text"),
                       GetSQLValueString($_POST['annual_value'], "text"),
                       GetSQLValueString($_POST['rate_nairage'], "text"),
                       GetSQLValueString($_POST['rate-payable'], "text"),
                       GetSQLValueString($_POST['arreas'], "text"),
                       GetSQLValueString($_POST['arrear_year'], "text"),
                       GetSQLValueString($_POST['penalty'], "text"),
                       GetSQLValueString($_POST['prev_balance'], "text"),
                       GetSQLValueString($_POST['grand_total'], "text"),
                       GetSQLValueString($_POST['remark'], "text"),
                       GetSQLValueString($_POST['pid'], "int"));

  mysql_select_db($database_amac_connection, $amac_connection);
  $Result1 = mysql_query($updateSQL, $amac_connection) or die(mysql_error());

  $updateGoTo = "updatesuccess.html";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['pid'])) {
  $colname_Recordset1 = $_GET['pid'];
}
mysql_select_db($database_amac_connection, $amac_connection);
$query_Recordset1 = sprintf("SELECT * FROM notice WHERE pid = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $amac_connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_update = "-1";
if (isset($_GET['pid'])) {
  $colname_update = $_GET['pid'];
}
mysql_select_db($database_amac_connection, $amac_connection);
$query_update = sprintf("SELECT * FROM notice WHERE pid = %s", GetSQLValueString($colname_update, "int"));
$update = mysql_query($query_update, $amac_connection) or die(mysql_error());
$row_update = mysql_fetch_assoc($update);

mysql_select_db($database_amac_connection, $amac_connection);
$query_update = "SELECT * FROM notice";
$update = mysql_query($query_update, $amac_connection) or die(mysql_error());
$row_update = mysql_fetch_assoc($update);
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
      <li></li>
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
      <h2 class="title"><a href="#">Data Form</a></h2>
      <div class="entry">
        <form action="<?php echo $editFormAction; ?>" name="form1" id="form 1" method="POST">
          <p>
            <label for="full_name">FULL NAME
:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="textfield"></label>
<input name="textfield" type="text" id="textfield" value="<?php echo $row_Recordset1['full_name']; ?>" />
          </p>
          <p>
            <label for="address">ADDRESS
:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="address" id="address"><?php echo $row_Recordset1['address']; ?></textarea>
          </p>
          <p>
            <label for="street_code">STREET CODE
:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="street_code" id="street_code"><?php echo $row_Recordset1['street_code']; ?></textarea>
          </p>
          <p>
            <label for="rate-year">RATE YEAR: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="rate-year" id="rate-year"><?php echo $row_Recordset1['rate_year']; ?></textarea>
          </p>
          <p>
            <label for="cadastral_zone">CADASTRAL ZONE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="cadastral_zone" id="cadastral_zone"><?php echo $row_Recordset1['cadastral_zone']; ?></textarea>
          </p>
          <p>
            <label for="property_address">PROPERTY ADDRESS:</label>
            <textarea name="property_address" id="property_address"><?php echo $row_Recordset1['property_address']; ?></textarea>
          </p>
          <p>
            <label for="use_property">USE OF PROPERTY:</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="use_property" id="use_property"><?php echo $row_Recordset1['property_use']; ?></textarea>
          </p>
          <p>
            <label for="rating_district">RATING DISTRICT:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="rating_district" id="rating_district"><?php echo $row_Recordset1['rating_district']; ?></textarea>
          </p>
          <p>
            <label for="assesment_no">ASSESSMENT No:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="assesment_no" id="assesment_no"><?php echo $row_Recordset1['assessement_no']; ?></textarea>
          </p>
          <p>
            <label for="annual_value">ANNUAL VALUE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="annual_value" id="annual_value"><?php echo $row_Recordset1['annual_value']; ?></textarea>
          </p>
          <p>
            <label for="rate_nairage">RATE NAIRAGE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="rate_nairage" id="rate_nairage"><?php echo $row_Recordset1['rate_nairage']; ?></textarea>
          </p>
          <p>
            <label for="rate-payable">RATE PAYABLE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="rate-payable" id="rate-payable"><?php echo $row_Recordset1['rate_payable']; ?></textarea>
          </p>
          <p>
            <label for="arreas">ARREARS:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="arreas" id="arreas"><?php echo $row_Recordset1['arrears']; ?></textarea>
          </p>
          <p>
            <label for="arrear_year">ARREAR YEAR:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="arrear_year" id="arrear_year"><?php echo $row_Recordset1['arrears_year']; ?></textarea>
          </p>
          <p>
            <label for="penalty">PENALTY:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="penalty" type="text" id="penalty" value="<?php echo $row_Recordset1['penalty']; ?>" />
          </p>
          <p>
            <label for="prev_balance">PREVIOUS BALANCE:</label>
            <input name="prev_balance" type="text" id="prev_balance" value="<?php echo $row_Recordset1['previous_balance']; ?>" />
          </p>
          <p>
            <label for="grand_total">GRAND TOTAL:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp; <input name="grand_total" type="text" id="grand_total" value="<?php echo $row_Recordset1['grand_total']; ?>" />
          </p>
          <p>
            <label for="remark">REMARKS:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="remark" type="text" id="remark" value="<?php echo $row_Recordset1['remark']; ?>" />
          </p>
          <p>
            <label for="pid">PID:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
           <input name="pid" type="text" id="pid" value="<?php echo $row_Recordset1['pid']; ?>" />
          </p>
          <p>
           &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input type="submit" name="button" id="button" value="Update" />
          </p>
          <input type="hidden" name="MM_update" value="form1" />
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
</div>
    </div>
    <div id="sidebar">
      <div> 
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
<?php
mysql_free_result($Recordset1);
?>
