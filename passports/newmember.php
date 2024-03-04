<?php require_once('Connections/connectalain.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.html";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

$colname_chkpin = "-1";
if (isset($_GET['pin'])) {
  $colname_chkpin = $_GET['pin'];
}
mysql_select_db($database_connectalain, $connectalain);
$query_chkpin = sprintf("SELECT * FROM alain_pins WHERE pin = %s", GetSQLValueString($colname_chkpin, "text"));
$chkpin = mysql_query($query_chkpin, $connectalain) or die(mysql_error());
$row_chkpin = mysql_fetch_assoc($chkpin);

$colname_load_dcc = "-1";
if (isset($_GET['password'])) {
  $colname_load_dcc = $_GET['password'];
}
mysql_select_db($database_connectalain, $connectalain);
$query_load_dcc = sprintf("SELECT * FROM ddc_officers WHERE password = %s", GetSQLValueString($colname_load_dcc, "text"));
$load_dcc = mysql_query($query_load_dcc, $connectalain) or die(mysql_error());
$row_load_dcc = mysql_fetch_assoc($load_dcc);
$totalRows_load_dcc = mysql_num_rows($load_dcc);

$colname_chkpin = "-1";
if (isset($_GET['pin'])) {
  $colname_chkpin = $_GET['pin'];
}
mysql_select_db($database_connectalain, $connectalain);
$query_chkpin = sprintf("SELECT * FROM alain_pins WHERE pin = %s", GetSQLValueString($colname_chkpin, "text"));
$chkpin = mysql_query($query_chkpin, $connectalain) or die(mysql_error());
$row_chkpin = mysql_fetch_assoc($chkpin);
$totalRows_chkpin = mysql_num_rows($chkpin);

 //This is the directory where images will be saved 
 $target = "passports/"; 
 $target = $target . basename( $_FILES['photo']['name']); 

$colname_newmember = "-1";
if (isset($_GET['password'])) {
  $colname_newmember = $_GET['password'];
}
mysql_select_db($database_connectalain, $connectalain);
$query_newmember = sprintf("SELECT * FROM ddc_officers WHERE password = %s", GetSQLValueString($colname_newmember, "text"));
$newmember = mysql_query($query_newmember, $connectalain) or die(mysql_error());
$row_newmember = mysql_fetch_assoc($newmember);

$colname_chk_pin = "-1";
if (isset($_GET['pin'])) {
  $colname_chk_pin = $_GET['pin'];
}
mysql_select_db($database_connectalain, $connectalain);
$query_chk_pin = sprintf("SELECT * FROM alain_pins WHERE pin = %s", GetSQLValueString($colname_chk_pin, "text"));
$chk_pin = mysql_query($query_chk_pin, $connectalain) or die(mysql_error());
$row_chk_pin = mysql_fetch_assoc($chk_pin);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "newmember")) {
  $insertSQL = sprintf("INSERT INTO memeber_reg (DDC_Officer, pin, first_name, last_name, DOB, state_origin, lga, business_name, specialization, business_address, website, email, `phone number`, phone2, pasport_photo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['dcc_officer'], "text"),
                       GetSQLValueString($_POST['reg_pin'], "text"),
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['dob'], "text"),
                       GetSQLValueString($_POST['stateorigin'], "text"),
                       GetSQLValueString($_POST['lga'], "text"),
                       GetSQLValueString($_POST['bizname'], "text"),
                       GetSQLValueString($_POST['specialization'], "text"),
                       GetSQLValueString($_POST['Bizaddress'], "text"),
                       GetSQLValueString($_POST['website'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['phone2'], "text"),
                       GetSQLValueString($_FILES['photo']['name'], "text"));

  mysql_select_db($database_connectalain, $connectalain);
  $Result1 = mysql_query($insertSQL, $connectalain) or die(mysql_error());

  $insertGoTo = "newmemberint.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_pin")) {
  $updateSQL = sprintf("UPDATE alain_pins SET pin=%s WHERE Serial_number=%s",
                       GetSQLValueString($_POST['pin'], "text"),
                       GetSQLValueString($_POST['sn'], "int"));

  mysql_select_db($database_connectalain, $connectalain);
  $Result1 = mysql_query($updateSQL, $connectalain) or die(mysql_error());

  $updateGoTo = "newmemberint.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form_dcc")) {
  $updateSQL = sprintf("UPDATE ddc_officers SET no_of_regs=%s WHERE `counter`=%s",
                       GetSQLValueString($_POST['no_of_regs'], "int"),
                       GetSQLValueString($_POST['counter'], "int"));

  mysql_select_db($database_connectalain, $connectalain);
  $Result1 = mysql_query($updateSQL, $connectalain) or die(mysql_error());

  $updateGoTo = "newmemberint.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

  //Writes the photo to the server 
 if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
 { 
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
// by Vic Phillips (02-09-2005) http://www.vicsjavascripts.org.uk
function zxcEnableDisable(zxcobj){
zxcval=zxcobj.options[zxcobj.selectedIndex].value
if (zxcval.length<1){ return }
zxcenable=zxcval.split('^')[1].split(',');
for (zxc0=1;zxc0<zxcenable.length;zxc0++){
zxcobj=document.getElementById(zxcenable[zxc0]);
zxcobj.removeAttribute('disabled')
}
zxcdisable=zxcval.split('^')[0].split(',');
for (zxc1=1;zxc1<zxcdisable.length;zxc1++){
zxcobj=document.getElementById(zxcdisable[zxc1]);
zxcobj.setAttribute('disabled','disabled')
}
}
function sender() {
document.forms["form_dcc"].target = 'dummy';
document.forms["newmember"].target = 'dummy2';
document.forms["form_pin"].submit();
document.forms["newmember"].submit();
document.forms["form_dcc"].submit();
return true;
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<head>
<style type="text/css">
#apDiv4 {
	position:absolute;
	width:485px;
	height:396px;
	z-index:1;
	left: 375px;
	top: 438px;
}
</style>
<iframe name="dummy" width="0" height="0"></iframe>
<iframe name="dummy2" width="0" height="0"></iframe>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALAIN</title>
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
	width:528px;
	height:157px;
	z-index:1;
	left: 282px;
	top: 152px;
}
#apDiv3 {
	position:absolute;
	width:830px;
	height:195px;
	z-index:1;
	left: -155px;
	top: -393px;
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
.forms {
	width: 280px;
	position: relative;
	float: left;
	white-space: normal;
}
</style>
</head>
<body>
<div id="wrapper">
  <div class="header2">
    <div class="logo"><img src="images/alain logo.jpg" alt="" width="180" height="168" /></div>
    <div class="headertext"> Association of Leather and Allied Industrialists of Nigeria </div>
  </div>
  <div id="page" class="container">
    <div class="mainpholder">
      <table width="973" height="77" border="1">
        <tr>
          <td width="425" valign="top">Officer: <?php echo $row_load_dcc['last_name']; ?> <?php echo $row_load_dcc['first_name']; ?></td>
          <td width="221" valign="top">No of Registrations: <?php echo $row_load_dcc['no_of_regs']; ?></td>
          <td width="289" valign="top">Last Login: <?php echo $row_load_dcc['last_login']; ?></td>
          <td width="10" valign="top">&nbsp;</td>
        </tr>
      </table>
    </div>
    <div class="navbar">
      <ul id="MenuBar1" class="MenuBarVertical">
        <li>
          <?php if ($totalRows_load_dcc > 0) { // Show if recordset not empty ?>
          <img src="passports/<?php echo $row_load_dcc['photo']; ?>" alt="Photo" width="188" height="147" />
          <?php } // Show if recordset not empty ?>
        </li>
        <li><a href="<?php echo $logoutAction ?>">Logout</a></li>
        <li>
          <form id="report_issue" method="get" action="issue.php">
            <label for="password2"></label>
            <input name="button" type="submit" class="MenuBarVertical" id="button4" value="Report an issue" />
            <input name="counter" type="hidden" id="counter" value="<?php echo $row_load_dcc['counter']; ?>" size="10" />
          </form>
        <a href="#"></a></li>
        <form name="form_pin" id="form_pin" method="POST" action="<?php echo $editFormAction; ?>">
          <p>
            <label for="sn"></label>
            <input name="sn" type="hidden" id="sn" value="<?php echo $row_chkpin['Serial_number']; ?>" />
          </p>
          <p>
            <label for="sn"></label>
            <input name="pin" type="hidden" id="pin" value="<?php echo $row_chkpin['pin']; ?>(.Use'd`)" />
          </p>
          <p>
            <input type="hidden" name="MM_update" value="form_pin" />
          </p>
        </form>
        <form name="form_dcc" id="form_dcc" method="POST" action="<?php echo $editFormAction; ?>">
          <p>
            <input name="counter" type="hidden" id="counter" value="<?php echo $row_load_dcc['counter']; ?>" />
          </p>
          <p>
            <input name="no_of_regs" type="hidden" id="no_of_regs" value="<?php echo $row_load_dcc['no_of_regs']+1; ?>" />
            <input type="hidden" name="MM_update" value="form_dcc" />
          </p>
        </form>
      </ul>
    </div>
    <p><span><strong>ALAIN MEMBERSHIP REGISTRATION</strong> (Step 2of 2)</span></p>
    <?php if ($totalRows_chkpin == 0) { // Show if recordset empty ?>
    <div id="apDiv2">
      <div align="center">The pin you provided is either invalid or is already in use. Please navigate back to previous page to  retry.</div>
    </div>
    <?php } // Show if recordset empty ?>
    <?php if ($totalRows_chkpin > 0) { // Show if recordset not empty ?>
    <div class="forms">
      <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" id="newmember">
        <table width="485" border="0">
          <tr>
            <td width="240">Registration Pin:
              <input name="reg_pin" type="text" id="reg_pin" value="<?php echo $row_chkpin['pin']; ?>" size="40" readonly="readonly" /></td>
            <td colspan="3">Business Address:
              <textarea name="Bizaddress" cols="27" id="Bizaddress"></textarea></td>
          </tr>
          <tr>
            <td>DDC Registrar:
              <label for="dcc_officer2"></label>
              <label for="DCC Registrar"></label>
              <input name="dcc_officer" type="text" id="dcc_officer" value="<?php echo $row_load_dcc['last_name']; ?> <?php echo $row_load_dcc['first_name']; ?>" size="40" readonly="readonly" /></td>
            <td colspan="3">Website:
              <input name="website" type="text" id="website" size="40" /></td>
          </tr>
          <tr>
            <td>First Name:
              <input name="first_name" type="text" id="first_name" size="40" /></td>
            <td colspan="3">Email:
              <input name="email" type="text" id="email" size="40" /></td>
          </tr>
          <tr>
            <td>Last Name:
              <input name="lastname" type="text" id="lastname" size="40" /></td>
            <td colspan="3">Phone 1:
              <input name="phone" type="text" id="phone" size="43" /></td>
          </tr>
          <tr>
            <td>Date of Birth:
              <span class="bold">
              <input name="dob" type="text" id="dob" onclick="cal2.select(document.forms['form_newmember'].DOB,'anchor2','dd/MM/yyyy'); return false;" value="DD/MM/YYYY" size="40" />
              </span></td>
            <td colspan="3">Phone 2:
              <input name="phone2" type="text" id="phone2" size="43" /></td>
          </tr>
          <tr>
            <td>State Origin:
              <input name="stateorigin" type="text" id="stateorigin" size="40" /></td>
            <td colspan="3">Passport Photo:
              <label for="photo3"></label>
              <input name="photo" type="file" id="photo3" size="28" /></td>
          </tr>
          <tr>
            <td>LGA:
              <input name="lga" type="text" id="lga" size="40" /></td>
            <td width="50">&nbsp;</td>
            <td width="112">&nbsp;</td>
            <td width="88"><input type="button" name="Button" id="button" value="Submit" onclick="javascript:sender()"/></td>
          </tr>
          <tr>
            <td>Business Name:
              <input name="bizname" type="text" id="bizname" size="40" /></td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td>Area of specialization:
              <label for="specialization"></label>
              <select name="specialization" id="specialization">
                <option>Select</option>
                <option>Shoes</option>
                <option>Belts</option>
                <option>Bags</option>
                <option>Raw Materials</option>
                <option>Others</option>
              </select></td>
            <td colspan="3">&nbsp;</td>
          </tr>
        </table>
        <p>
          <input type="hidden" name="MM_insert" value="newmember" />
        </p>
      </form>
    </div>
    <?php } // Show if recordset not empty ?>
    <p><!-- end #content -->
    <!-- end #sidebar -->  </p>
</div>
  <?php if ($totalRows_chkpin > 0) { // Show if recordset not empty ?>
    <!-- end #page -->
  <?php } // Show if recordset not empty ?>
</div>
<div class="partnersholder">
  <div class="mainpholder"></div>
</div>
<div id="footer">
  <p>© 2013 <a href="www.taggedsecurity.com">Tagged Technologies</a>. All rights reserved.ALAIN Official website and projects Portal.</p>
</div>
<!-- end #footer -->
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($load_dcc);

mysql_free_result($chkpin);
?>
