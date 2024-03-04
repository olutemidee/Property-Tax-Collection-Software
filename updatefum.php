<?php require_once('Connections/amac_connection.php'); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amac";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if(mysqli_connect_errno()) {
		die("Failed to connect with MySQL: ". mysqli_connect_error());
	}
$pid = $_GET['pid'];
if (isset($_GET['pid'])) {
  $pid = $_GET['pid'];

mysqli_select_db($con,$db_name);
$query_notice =mysqli_query( $conn,"SELECT * FROM fumigation WHERE pid=".$_GET['pid']) ;

$row_notice = mysqli_fetch_array($query_notice);


}
if(count($_POST)>0)
{
	$pid=$_POST['pid'];
$full_name=$_POST['full_name'];
$address=$_POST['address'];
$premise_type=$_POST['premise_type'];
$sql = "UPDATE fumigation 
		SET full_name='$full_name',
		address='$address',
		premise_type='$premise_type'
		
 WHERE pid=".$_POST['pid'];


if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
}
mysqli_close($conn);
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
        <form action="" name="form1" id="form 1" method="POST">
          <p>
            <label for="full_name">FULL NAME
:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="full_name"></label>
<textarea name="full_name" id="full_name"><?php echo $row_notice['full_name'];?></textarea>
          </p>
          <p>
            <label for="address">ADDRESS
:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="address" id="address"><?php echo $row_notice['address']; ?></textarea>
          </p>
          
          <p>
            <label for="rate-year">RATE YEAR: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="rate_year" id="rate_year"><?php echo $row_notice['rate_year']; ?></textarea>
          </p>
          <p>
            <label for="district">PREMISE TYPE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="premise_type" id="premise_type"><?php echo $row_notice['premise_type']; ?></textarea>
          </p>
          
          <p>
            <label for="use_property">USE OF PROPERTY:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="property_use" id="property_use"><?php echo $row_notice['property_use']; ?></textarea>
          </p>
          
          <p>
            <label for="assesment_no">RATING DISTRICT:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="rating_district" id="rating_district"><?php echo $row_notice['rating_district']; ?></textarea>
          </p>
          
         
          <p>
            <label for="rate-payable">RATE PAYABLE:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="rate_payable" id="rate_payable"><?php echo $row_notice['rate_payable']; ?></textarea>
          </p>
          <p>
            <label for="arreas">ARREARS:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="arrears" id="arrears"><?php echo $row_notice['arrears']; ?></textarea>
          </p>
          <p>
            <label for="arrear_year">ARREAR YEAR:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea name="arrears_year" id="arrears_year"><?php echo $row_notice['arrears_year']; ?></textarea>
          </p>
          <p>
            <label for="penalty">PENALTY:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="penalty" type="text" id="penalty" value="<?php echo $row_notice['penalty']; ?>" />
          </p>
          
          <p>
            <label for="grand_total">GRAND TOTAL:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp; <input name="grand_total" type="text" id="grand_total" value="<?php echo $row_notice['grand_total']; ?>" />
          </p>
          
          <p>
            <label for="pid">PID:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
           <input name="pid" type="text" id="pid" value="<?php echo $row_notice['pid']; ?>" />
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

