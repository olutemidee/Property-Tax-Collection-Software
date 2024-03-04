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
	font-size: 20px;
}
</style>
</head>

<body>
<form id="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="981" height="190" border="0">
    <tr>
      <td width="971" height="175">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="993" height="346" border="3">
    <tr>
      <td height="38"><p>Reminder Notice is hereby given to:  - <?php echo $row_notice['full_name']; ?>-- PID (<?php echo $row_notice['pid']; ?>)</p>
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
  
  <table width="995" height="158" border="3">
    <tr>
      <td height="130"><p>Sir/Madam</p>
      
        <p>Further to the Tenement Rate Demand Notice served on the propery(ies) you are occupaying on ......date....... at ......cadestral zone.... you are hereby reminded of your outstanding rate liability to the tune of<font size="+2.5"> =N=<?php echo $row_notice['grand_total']; ?></font> </p>
        <p>2. By a copy of this letter, you are requested to effect payment of the above amount into AMAC Tenement Rate A/C No. 0012770945, with Diamond Bank of Nigeria PLC, Muhammed Buhari Way, near old parade ground central business district, Abuja or any other bank listed at the back of this notice. Reciept(s) will therefore be issued on presentation of your teller at the Tenement Rate / Valuation Office, AMAC, Garki, Abuja.</p>
        <p>3. This notice is served pursuant to section 7 (4th Schedule) of the 1999 constitution; FCT act cap. 503, LFN 2004 (Vol. 3) as amended; Taxes and levies act No. 21 of 1998 and AMAC Tenement Rate Bye Laws 2002.</p>
        <p>4. Please take Notice that the Honourable chairman In accordance with the provision of section 7 (4th schedule) of the 1999 constitution of the Federal Republic of Nigeria; Federal Capital Territory Act Cap 503, Laws of the Federation 1990; Taxes and Levies Act No. 21 of 1998 and A.M.A.C.Tenement Rate bye-Laws 2001, we forwarded herewith your bill for the year <?php echo $row_notice['rate_year']; ?>, totaling <font size="+2.5">=N=   <?php echo $row_notice['grand_total']; ?> </font>in respect of the landed property you are occupying in Abuja as per details above.
      </p>        <p>&nbsp;</p></td>
    </tr>
  </table>
  <table width="996" border="3">
    <tr>
      <td><strong>NOTE: Please turn overleaf for list of banks into which payment can be made AND add the PID No. above to the DEPOSITOR'S NAME on the Bank teller.</strong></td>
    </tr>
  </table>
  <p>Your early compliance will be highly appreciated.</p>
<p>Yours faithfully,</p>
<table width="991" height="221" border="0">
    <tr>
      <td width="533" height="217"><table width="342" height="263" border="0">
        <tr>
          <td height="237"><img src="signature.jpg" alt="sign" width="346" height="105" />......................................................................<br />
              <strong>MR. JOSEPH AGHOTOR,</strong>&nbsp; <font size="-3">ANIVS,  RSV, MBA, MFIABCI</font><br />
              Head (Tenement Rate/Valuation Office) <br />
              For: Honourable Chairman<br />
            Abuja Municipal Area Council</td>
        </tr>
        <tr>
          <td><p>&nbsp;</p></td>
        </tr>
      </table></td>
      <td width="450" height="217"><table width="450" height="138" border="1">
        <tr>
          <td width="134" height="57">DATE OF DESPATCH</td>
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
