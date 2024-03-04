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
  <table width="981" height="100" border="0">
   <tr>
      <td width="971" height="96">&nbsp;</td>
    </tr>      
  </table>
  <p>&nbsp;</p>
  <table width="993" height="287" border="2">
    <tr>
      <td height="20"><p>Reminder Notice is hereby given to:  - <?php echo $row_notice['full_name']; ?>-- PID (<?php echo $row_notice['pid']; ?>)</p>
      <p> </p></td>
    </tr>
    <tr>
      <td height="244"><p><?php echo $row_notice['address']; ?></p>
        <p>In respect of the property below:</p>
      <p>Assessment No.: <?php echo $row_notice['assessement_no']; ?></p>
      <p>property Address:- <?php echo $row_notice['property_address']; ?></p>
      <p>Cadastral Zone:- <?php echo $row_notice['cadastral_zone']; ?></p>
      <p>Use of Property:- <?php echo $row_notice['property_use']; ?></p>
      <p>Rating District:- <?php echo $row_notice['rating_district']; ?></p></td>
    </tr>
  </table>
  
  <table width="995" height="433" border="3">
    <tr>
      <td height="423"><p>Sir/Madam</p>
      <p>Further to the Tenement Rate Demand Notice served on the property(ies) you are <br /><br />occupying on ....................................................... you are hereby reminded of your outstanding rate liability to the tune of</p>
        <p><font size="+2.5"> =N=<?php echo $row_notice['grand_total']; ?></font> </p>
        <p>2. By a copy of this letter, you are requested to effect payment of the above amount into AMAC Tenement Rate Account through e-Bill pay platform from NIBSS in all the commercial Banks listed at the back of this notice. Receipt(s) will therefore be issued to you on presentation of your teller at the Tenement Rate/ Valuation Annex Office: Plot 1194 Aminu Kano Crescent (No: 3, Niafounke Close), behind Access Bank Plc, Wuse II,  Abuja,FCT.</p>
        <p>3. This notice is served pursuant to section 7 (4th Schedule) of the 1999 constitution; FCT Act Cap. 503, LFN 2004 (Vol. 3) as amended; Taxes and levies Act No. 21 of 1998 and AMAC Tenement Rate Bye Laws No. 99 of 2012</p>
        <p>4. Please take Notice that the Honourable Chairman has been informed of your failure to settle your bill and has accordingly directed this office to take necessary action against you; should you fail to effect payment within seven(7) working days from the date of this notice.</p></td>
    </tr>
  </table>
  <table width="996" border="3">
    <tr>
      <td height="40"><strong>NOTE: Please turn overleaf for list of banks into which payment can be made AND add the PID No. above to the DEPOSITOR'S NAME on the Bank teller.</strong></td>
    </tr>
  </table>
  <p>Your early compliance will be highly appreciated.<BR/><BR/>
Yours faithfully</p>
  <table width="1021" height="205" border="0">
    <tr>
      <td width="624" height="201"><table width="632" height="189" border="0">
        <tr>
          <td width="626" height="120"><img src="signature.jpg" alt="sign" width="275" height="80" />&nbsp;&nbsp;<img src="MRADE.JPG" width="210" height="98"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            <strong>HEAD OF TENEMENT RATE&nbsp;&nbsp;&nbsp;DIRECTOR OF OPERATIONS</strong><br /> 
            <font size="-1">For: Honourable Chairman&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For: Honourable Chairman<br />Abuja Municipal Area Council&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Abuja Municipal Area Council<br /></font><br />
            </td>
        </tr>
        <tr>
          <td height="20"><p>&nbsp;</p></td>
        </tr>
      </table></td>
      <td width="387" height="201">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table width="375" height="129" border="1">
        <tr>
          <td width="189" height="48">DATE OF DESPATCH</td>
          <td width="170">&nbsp;</td>
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
<p>&nbsp;</p>
</form>
<a title="print" style= "cursor:pointer;" onclick="window.print();">PRINT</a>
</body>
</html>
<?php
mysql_free_result($notice);

mysql_free_result($officer);
?>
