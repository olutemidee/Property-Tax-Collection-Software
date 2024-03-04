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

$colname_notice = "-1";
if (isset($_GET['pid'])) {
  $colname_notice = $_GET['pid'];
}
mysql_select_db($database_amac_connection, $amac_connection);
$query_notice = sprintf("SELECT * FROM notice WHERE pid = %s", GetSQLValueString($colname_notice, "int"));
$notice = mysql_query($query_notice, $amac_connection) or die(mysql_error());
$row_notice = mysql_fetch_assoc($notice);
$totalRows_notice = mysql_num_rows($notice);

mysql_select_db($database_amac_connection, $amac_connection);
$query_officer = "SELECT * FROM registration";
$officer = mysql_query($query_officer, $amac_connection) or die(mysql_error());
$row_officer = mysql_fetch_assoc($officer);
$totalRows_officer = mysql_num_rows($officer);

mysql_select_db($database_amac_connection, $amac_connection);
$query_Recordset1 = "SELECT * FROM notice";
$Recordset1 = mysql_query($query_Recordset1, $amac_connection) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AMAC</title>
<style type="text/css">
body,td,th {
	font-family: "Arial Black", Gadget, sans-serif;
	line-height: 19px;
	font-size: 18px;
	font-weight: bolder;
}
</style>
</head>

<body>
<form id="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="981" height="203" border="0">
    <tr>
      <td width="971" height="175">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="993" height="435" border="1">
    <tr>
      <td height="109"><p>Final Reminder Notice is hereby given to:  - <?php echo $row_notice['full_name']; ?>-- PID (<?php echo $row_notice['pid']; ?>)</p>
      <p> </p></td>
    </tr>
    <tr>
      <td><p></p>
        <p><?php echo $row_notice['address']; ?></p>
        <p>In respect of the property below:</p>
      <p>Assessment No.: <?php echo $row_notice['assessement_no']; ?></p>
      <p>property Address:- <?php echo $row_notice['property_address']; ?></p>
      <p>Cadastral Zone:- <?php echo $row_notice['cadastral_zone']; ?></p>
      <p>Use of Property:- <?php echo $row_notice['property_use']; ?></p>
      <p>Street Code:- <?php echo $row_notice['street_code']; ?></p> <p>Rating District:- <?php echo $row_notice['rating_district']; ?></p></td>
    </tr>
  </table>
  <table width="995" height="317" border="0">
    <tr>
      <td height="307"><p>Sir/Madam</p>
        <p>1. It has been brought to our attention that you have either refused or neglected to pay your tenement rate in the sum of <?php echo $row_notice['grand_total']; ?> due on your property(ies) which situate at <?php echo $row_notice['address']; ?>.</p>
        <p>2. As a matter of fact, we have allowed you ample time within which to settle the bill(s), but you have persistently disregarded our notices.</p>
        <p>3. Therefore, unless you settle your bill(s) within TWO (2) weeks from the date of this notice, the Abuja Municipal Area Council will have no choice but to SEAL OFF the premises until the tenement rate is paid.</p>
      <p>4. If you dispute the amount stated above, please call at the above address with your reciept(s) and reconcile with the head of tenement rate/valuation office.</p><p>&nbsp;</p></td>
    </tr>
  </table>
  <table width="996" border="3">
    <tr>
      <td><strong>Please turn overleaf for list of banks into which payment can be made.</strong></td>
    </tr>
  </table>
  <p>Your early compliance will be highly appreciated.</p>
<p>Yours faithfully,</p>
<table width="991" height="209" border="0">
    <tr>
      <td width="533" height="205"><img src="headname.jpg" alt="head" width="348" height="161" />   </td>
      <td width="450" height="205"><table width="450" height="138" border="1">
        <tr>
          <td width="134" height="57">DATE OF DISPATCH</td>
          <td width="300">&nbsp;</td>
        </tr>
        <tr>
          <td height="49">NAME OF OFFICER</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="22">MODE</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
<a title="print" style= "cursor:pointer;" onclick="window.print();">PRINT</a>
</body>
</html>
<?php
mysql_free_result($notice);

mysql_free_result($officer);
?>
