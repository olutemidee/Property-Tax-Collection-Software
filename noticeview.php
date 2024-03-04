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
	font-size: 14px;
}
</style>
</head>

<body>
<form id="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="981" height="223" border="1">
    <tr>
      <td width="971" height="217"><img src="head.jpg" alt="" width="971" height="157" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="993" height="346" border="3">
    <tr>
      <td height="38"><p>Notice is hereby given to:  - <?php echo $row_notice['full_name']; ?> PID (<?php echo $row_notice['pid']; ?>)</p>
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
      <p>Rating District:- <?php echo $row_notice['rating_district']; ?></p></td>
    </tr>
  </table>
  <table width="994" height="188" border="3">
    <tr>
      <td width="234"><table width="352" height="217" border="3">
        <tr>
          <td width="149">Bill Ref:</td>
          <td width="177">&nbsp;</td>
        </tr>
        <tr>
          <td>Agency Code:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Revenue Code:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Rate Year:</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
      <td width="305"><table width="603" border="3">
        <tr>
          <td width="374" height="23">ANNUAL VALUE:</td>
          <td width="209">&nbsp;</td>
        </tr>
        <tr>
          <td height="25">RATE NAIRAGE:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="21">RATE PAYABLE:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="27">ARREARS:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="24">ARREARS YEAR:</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="25">PENALTY (10%): </td>
        </tr>
        <tr>
          <td height="26">GRAND TOTAL:</td>
          <td></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <table width="995" height="158" border="3">
    <tr>
      <td height="130">In accordance with the provision of section 7 (4th schedule) of the 1999 constitution of the Federal Republic of Nigeria; Federal Capital Territory Act Cap 503, Laws of the Federation 1990; Taxes and Levies Act No. 21 of 1998 and A.M.A.C.Tenement Rate bye-Laws 2001, we forwarded herewith your bill for the year  , totaling =N=   in respect of the landed property you are occupying in Abuja as per details above.
        <p>&nbsp;</p></td>
    </tr>
  </table>
  <table width="996" border="3">
    <tr>
      <td><strong>Please turn overleaf for list of banks into which payment can be made.</strong></td>
    </tr>
  </table>
  <p>Your early compliance will be highly appreciated.</p>
<p>Yours faithfully,</p>
<table width="251" height="52" border="3">
  <tr>
    <td>signature</td>
  </tr>
</table>
<p>.............................................................    </p>
  <table width="993" height="183" border="0">
    <tr>
      <td height="159"><img name="" src="FOOTER2.jpg" width="878" height="129" alt="" /></td>
    </tr>
  </table>
</form>


</body>
</html>
<?php
mysql_free_result($notice);
?>
