<?php

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('db_config.php');

if(isset($_POST["submit_file"]))
{
	$host = "localhost";
	$user = "root";
	$password = '';
	$db_name = "amac";
	
	$conn = mysqli_connect($host, $user, $password, $db_name);
	if(mysqli_connect_errno()) {
		die("Failed to connect with MySQL: ". mysqli_connect_error());
	}
 $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          $pid = $filesop[0];
         

          
mysqli_select_db($conn,$db_name);
$query_notice =mysqli_query( $conn,"SELECT * FROM notice WHERE pid='$filesop[0]'") ;

$row_notice = mysqli_fetch_array($query_notice);

            /*$annual=number_format($row_notice['annual_value'],2); /* Format Number with decimal point */
        /* $c = $c + 1;
		 $c++;*/
		        }


}


?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>KUJE</title>
<html xmlns="http://www.w3.org/1999/xhtml">
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

<form id="form1" method="post" action="bulknotice.php">
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
      <td width="993" height="2"><p>Notice is hereby given to:  - <?php echo $row_notice['full_name']; ?>-- PID (<?php echo $row_notice['district_prefix']; ?><?php echo $row_notice['pid']; ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEAR <?php echo $row_notice['rate_year']; ?></p>
      </td>
    </tr>
</table>
<table width="993" height="2" border="-1">

<tr border="0">
    <td border="0">
      <p>In respect of the property below:</p>
	
<p> property Address:-&nbsp;&nbsp;&nbsp;<?php echo $row_notice['address']; ?></p>
        
     <p>Assessment No.:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_notice['assessement_no']; ?></p>
     
      <p>Cadastral Zone:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['cadastral_zone']; ?></p>
      <p>Use of Property:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['property_use']; ?></p>
      <p>Rating District:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_notice['rating_district']; ?></p>
</td>
<td width="200" ><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="qrcode1.jpg" alt="sign" width="100" height="65" /></p>
<p>info@tenement-ng.com
</p>
</td>
   </table>
  <table width="993" height="60" border="-1">
    <tr>
      <td width="200" height="50"><table width="352" height="40" border="-1">
        
	<td>
          <p>Bill Ref:
          <?php echo $row_notice['rate_year']; ?>/<?php echo $row_notice['pid']; ?></p>
        
       
          <p>Agency Code:
           2014000</p>
        
        
          <p>Revenue Code:
          1002</p>
        
        
          <p>Rate Year:
      <?php echo $row_notice['rate_year']; ?></p>
        </td>
      </tr>
</table>
      <td width="305">&nbsp;BILL INFORMATION:
        <table width="603" border="-1">
	<tr>
        
          <td>
	<p>ANNUAL VALUE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          N<?php echo number_format($row_notice['annual_value'],2);?></p>
        
        
          <p>RATE NAIRAGE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          4 kobo per Naira</p>
        
        
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
  <table width="995" height="15" border="-1">
    
      <td><strong>In accordance with the provision of Sections 7 (4th Schedule) of the 1999 Constitution of the Federal Republic of Nigeria(as
amended), Federal Capital Territory Act Cap 503 Laws of the Federation of Nigeria 1999, Taxes and Levies(Approved List for
Collection) CAP T2 LFN 2004, Local Government Act Laws of FCT 2006 Vol. 3, and KUJE Area Council Revenue Generation
Bye-Law (2005), we forward herewith your bill for the year  <?php echo $row_notice['rate_year']; ?>, totaling =N=   <?php echo $row_notice['grand_total']; ?> in respect of the landed property(ies)
you are occupying in Abuja as per details above</strong>
      </td>
    
  </table>
  <table width="995" border="-1">
    <tr>
      <td height="5"><strong>NOTE: Please turn overleaf for list of payment options through which payment can be made and ensure your electronic receipt is collected from the bank.</strong></td>
    </tr>
  </table>
  <tr><p>Your early compliance will be highly appreciated.</p>
Yours faithfully,
<table width="1023" height="10" border="0">
    <tr>
      <td width="576" height="10"><table width="575" height="10" border="0">
        <tr>
          <td width="569" height="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </font>
            </p></td>
        </tr>
        <tr>
          
        </tr>
      </table></td>
      <td width="400" height="10"><table width="380" height="10" border="-1">
        <tr>
          <td width="188" height="10">ACKNOWLEDGEMENT</td>
          
        </tr>
        <tr>
          <td height="10">NAME</td>
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
      </table></td>
    </tr>
  </table>
<table width="1023" height="70" border="0">
    <tr>
      <td width="576" height="60"><table width="575" height="50" border="0">
        <tr>
          <td width="569" height="35"><p><img src="sign11.jpg" alt="sign" width="230" height="40" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="MRADE.JPG" width="220" height="40"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            <strong><font size="-1">
            HEAD OF WORKS, HOUSING,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HEAD, TECHNICAL COMMITTEEE LAND & SURVEY</strong><br /><font size="-1">For: Honourable Chairman&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;For: Honourable Chairman<br />
            Kuje Area Council&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kuje Area Council<br />
            </font>
            </p></td>
        </tr>
        <tr>
          <td><p>&nbsp;</p></td>
        </tr>
      </table></td>
      <td width="400" height="60"><table width="380" height="50" border="1">
        <tr>
          <td width="188" height="10">DATE OF DESPATCH</td>
          <td width="211">&nbsp;</td>
        </tr>
        <tr>
          <td height="10">NAME OF OFFICER</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="15">MODE</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
	<?php
	$pid++;
	?>
  </table>

</form>

</body>

</html>

