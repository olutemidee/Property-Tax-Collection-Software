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
	font-size: 16px;
	font-weight: normal;
}
body {
	background-image: url();
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
  <table width="993" height="346" border="3">
    <tr>
      <td height="38"><p>Notice is hereby given to:  - <?php echo $row_notice['full_name']; ?>-- PID (<?php echo $row_notice['pid']; ?>)</p>
      <p> </p></td>
    </tr>
    <tr>
      <td><p></p>
        <p><?php echo $row_notice['address']; ?></p>
        <p>In respect of the property below:</p>
      <p>Assessment No.:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_notice['assessement_no']; ?></p>
      <p>property Address:-&nbsp;&nbsp; <?php echo $row_notice['property_address']; ?></p>
      <p>Cadastral Zone:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['cadastral_zone']; ?></p>
      <p>Use of Property:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['property_use']; ?></p>
      <p>Rating District:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['rating_district']; ?></p></td>
    </tr>
  </table>
  <table width="994" height="225" border="3">
    <tr>
      <td width="234" height="221"><table width="352" height="217" border="3">
        <tr>
          <td width="149">Bill Ref:</td>
          <td width="177"><?php echo $row_notice['rate_year']; ?>/<?php echo $row_notice['pid']; ?></td>
        </tr>
        <tr>
          <td>Agency Code:</td>
          <td> 2014000</td>
        </tr>
        <tr>
          <td>Revenue Code:</td>
          <td>1002</td>
        </tr>
        <tr>
          <td>Rate Year:</td>
          <td><?php echo $row_notice['rate_year']; ?></td>
        </tr>
      </table></td>
      <td width="305">&nbsp;BILL INFORMATION:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=N=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;K
        <table width="603" border="3">
        <tr>
          <td width="374" height="23">ANNUAL VALUE:</td>
          <td width="209"><?php echo $row_notice['annual_value']; ?>.00</td>
        </tr>
        <tr>
          <td height="25">RATE NAIRAGE: @<?php echo $row_notice['rate_nairage']; ?> per =N=</td>
          <td>@<?php echo $row_notice['rate_nairage']; ?></td>
        </tr>
        <tr>
          <td height="21">RATE PAYABLE:</td>
          <td><?php echo $row_notice['rate_payable']; ?>.00</td>
        </tr>
        <tr>
          <td height="27">ARREARS:</td>
          <td><?php echo $row_notice['arrears']; ?>.00</td>
        </tr>
        <tr>
          <td height="24">ARREARS YEAR: &nbsp; <?php echo $row_notice['arrears_year']; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="25">PENALTY (10%): </td>
          <td><?php echo $row_notice['penalty']; ?>.00</td>
        </tr>
        <tr>
          <td height="25">PREVIOUS BALANCE: </td>
          <td><?php echo $row_notice['previous_balance']; ?>.00</td></tr>
        <tr>
          <td height="26">GRAND TOTAL:</td>
          <td><?php echo $row_notice['grand_total']; ?>.00</td>
        </tr>
      </table></td>
    </tr>
  </table>
  <table width="995" height="141" border="2">
    <tr>
      <td height="133"><strong>In accordance with the provisions of section 7 (4th schedule) of the 1999 constitution of the Federal Republic of Nigeria; Federal Capital Territory Act Cap 503, LFN. 2004 (Vol. 3) as amended;  Taxes and Levies Act No. 21 of 1998 and A.M.A.C.Tenement Rate bye-Laws 2001, we forward herewith your bill for the year  <?php echo $row_notice['rate_year']; ?>, totaling =N=   <?php echo $row_notice['grand_total']; ?> in respect of the landed property(ies) you are occupying in Abuja as per details above.</strong>
      <p>&nbsp;</p></td>
    </tr>
  </table>
  <table width="996" border="3">
    <tr>
      <td><strong>NOTE: Please turn overleaf for list of banks into which payment can be made AND add the PID No. above to the DEPOSITOR'S NAME on the Bank teller.</strong></td>
    </tr>
  </table>
  <p>Your early compliance will be highly appreciated.</p>
<p>Yours faithfully,</p>
<table width="991" height="607" border="0">
    <tr>
      <td width="533" height="603"><table width="553" height="601" border="0">
        <tr>
          <td width="347" height="148"><p><img src="scan0001.jpg" alt="sign" width="220" height="69" valign="left"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="scan0001.jpg" alt="sign" width="220" height="70" valign="left"/><br/>
 ............................................&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;............................................</p>
         <p><strong>MR. AGARA SYLVESTER</strong>     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MR. ADEMOLA OGUNKUNLE<br />
           Director, Planning/Valuation    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Director, Operations<br/>
         AMAC(ANNEX OFFICE)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AMAC(ANNEX OFFICE)</p>
         <p><br />
         </p></td>
               
        </tr>
        
          <tr>
          <td width="347" height="186"><p><img src="signature.jpg" alt="sign" width="220" height="75" /><br/>
 ............................................<br/><p><strong>MR. JOSEPH AGHOTOR,</strong><font size="-3">ANIVS,  RSV, MBA, MFIABCI</font> <br />
              Head (Tenement Rate/Valuation Office) <br />
              For: Honourable Chairman<br />
            Abuja Municipal Area Council</p></td>
               
 
          </tr>
      <td width="347" height="237">&nbsp;</td>
        </tr>
        <tr>
          <td><p>&nbsp;</p></td>
        </tr>
      </table></td>
      <td width="450" height="603"><table width="450" height="138" border="1">
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
