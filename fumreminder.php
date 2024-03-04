
<?php 	
	$host = "localhost";
	$user = "root";
	$password = '';
	$db_name = "amac";
	
	$con = mysqli_connect($host, $user, $password, $db_name);
	if(mysqli_connect_errno()) {
		die("Failed to connect with MySQL: ". mysqli_connect_error());
	}
?>


<?php



$pid = $_GET['pid'];
if (isset($_GET['pid'])) {
  $pid = $_GET['pid'];

mysqli_select_db($con,$db_name);
$query_notice =mysqli_query( $con,"SELECT * FROM fumigation WHERE pid=".$_GET['pid']) ;

$row_notice = mysqli_fetch_array($query_notice);

$rate=number_format($row_notice['rate_payable'],2); /* Format Number with decimal point */

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AMAC</title>
<style type="text/css">
body,td,th {
	font-family: "Arial Black", Gadget, sans-serif;
	line-height: 17px;
	font-size: 16px;
	font-weight: normal;
}
body {
	background-image: url();
}
</style>
</head>

<body>
<BR>
<BR>
<BR>
<form id="form1" method="post" action="">
  <p>&nbsp;</p>
   <p>&nbsp;</p>
 <!- <table width="961" height="20" border="0">
  <!- <tr>
    <!-  <td width="951" height="20">&nbsp;<!</td>
  <!-</tr>
  <!</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="993" height="2" border="-1">
    <tr>
      <td width="993" height="2"><p>Reminder Notice is hereby given to:  - <?php echo $row_notice['full_name']; ?>-- PID (<?php echo $row_notice['district_prefix']; ?><?php echo $row_notice['pid']; ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEAR <?php echo $row_notice['rate_year']; ?></p>
      </td>
    </tr>
</table>
<table width="993" height="2" border="-1">

<tr border="0">
    <td border="0">
      <p>In respect of the property below:</p>
	
<p> Name of Premises:-&nbsp;&nbsp;&nbsp;<?php echo $row_notice['full_name']; ?></p>
        
     <p>Addresss of Premises.:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_notice['address']; ?></p>
     
      <p>Type of Premises:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['premise_type']; ?></p>
      <p>Use of Property:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['property_use']; ?></p>
      <p>Rating District:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['rating_district']; ?></p>
</td>
<td><p><img src="qrcode.jpg" alt="sign" width="100" height="45" /></p>
<p>info@fumigation-ng.com
</p>

   </table>
   <p>THE MANAGEMENT OF ABUJA OF ABUJA MUNICIPAL AREA COUNCIL (Environmental Services Department), </br>Fumigation/Pest Control Unit wishes to notify you in accordance with the provision of Section 4,5,6 and 7 of <br>Abuja Municipal Area Council Pest Bye Law (2012) and other extant Law of Environmental Health Offences 2012. <br>That you are to pay a charge of.....N<?php echo number_format($row_notice['rate_payable'],2); ?>............
   N<?php echo number_format($row_notice['rate_payable'],2); ?></p>  
  
      <p>An Offence under this Bye-Law;<br>(1) Provinsion of Section 4 .....(2) Provinsion of Section 5 ..... (3) Provision of Section 6.....(4) Provision of Section 7....</p>
	  
	  <p>Please take note that the charges should be paid to ACCESS BANK; 0046033772; ALPHACYN NIG. LTD. </p>
	
	  <p>You are to make necessary payment within 14 days of this notice and present evidence of payment to the above<br> Annex Office and obtain an official Receipt.</p>
	  <p>Note: Payment to any location other than the prescribed Account shall be treated as invalid.</br>
	  Necessary response will be highly appreciated.</p>
	  
	  

      &nbsp;BILL INFORMATION: 
        <table width="603" border="-1">
	<tr>
        
          <td>
        
        
          <p>RATE PAYABLE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          N<?php echo number_format($row_notice['rate_payable'],2); ?>
	</p>
	</td>
        </tr>
	</table>
	<table width="603" border="-1">
        <tr>

          <td>
          <p>ARREARS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          N<?php echo number_format($row_notice['arrears'],2); ?></p>
        
        
          <p>ARREARS YEAR(S) "AS AT": &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_notice['arrears_year']; ?></p>
          
          <p>PENALTY ON ARREARS(10%):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          N<?php echo number_format($row_notice['penalty'],2); ?></p>
        
	</td>
	</tr>
	</table>
	<table width="603" border="-1">
	<tr>
	<td>
          <p>GRAND TOTAL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          N<?php echo number_format($row_notice['grand_total'],2); ?></p>
        </td>
		
	</tr>
      </table>
    
    </tr>
  </table> 
  <tr><p>Your early compliance will be highly appreciated.</p>
Yours faithfully,
<table width="1023" height="40" border="0">
    <tr>
      <td width="576" height="30"><table width="575" height="0" border="0">
        <tr>
          <td width="569" height="30"><p><img src="sign1.jpg" alt="sign" width="200" height="20" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            <strong><font size="-1">
            HEAD OF ENVIRONMENTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><br /><font size="-1">For: Honourable Chairman<br />
            Abuja Municipal Area Council&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            </font>
            </p></td>
        </tr>
        
      </table></td>
      <td width="400" height="30"><table width="380" height="20" border="1">
        
		 <tr>
          <td height="10">NAME OF DESPATCH</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">DATE</td>
          <td>&nbsp;</td>
        </tr>
	<tr>
          <td height="10">SIGNATURE</td>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td width="188" height="8">RECEIVER NAME</td>
          <td width="211">&nbsp;</td>
        </tr>
        <tr>
          <td height="8">COLLECTION MODE</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="18">SIGNATURE</td>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td height="10">OFFENCE</td>
          <td>&nbsp;1)No evidence of Fumigation....2)Obstruction of EHO...3)Use of unaccredited vendor....4)Environmental Offences</td>
        </tr>
		<tr>
          <td height="10">QUARTER</td>
          <td>&nbsp;1ST.......2ND........3RD.......4TH.......</td>
        </tr>
      </table></td>
    </tr>
  </table>

</form>

</body>
</html>
<?php



?>
