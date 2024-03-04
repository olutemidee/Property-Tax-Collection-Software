<?php require_once('Connections/conn.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO notice (full_name, address, street_code, rate_year, cadastral_zone, propert_address, use_property, rating_district, annual_value, rate_nairage, rate_payable, arrears, arrears_year, penalty, prev_balance, grand_total, remark, pid) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['fullname'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['streetcode'], "text"),
                       GetSQLValueString($_POST['rateyear'], "text"),
                       GetSQLValueString($_POST['cadatralzone'], "text"),
                       GetSQLValueString($_POST['propertyadress'], "text"),
                       GetSQLValueString($_POST['useproperty'], "text"),
                       GetSQLValueString($_POST['ratingdistrict'], "text"),
                       GetSQLValueString($_POST['annualvalue'], "text"),
                       GetSQLValueString($_POST['ratenairage'], "text"),
                       GetSQLValueString($_POST['ratepayable'], "text"),
                       GetSQLValueString($_POST['arrears'], "text"),
                       GetSQLValueString($_POST['arrears'], "text"),
                       GetSQLValueString($_POST['penalty'], "text"),
                       GetSQLValueString($_POST['prevbalance'], "text"),
                       GetSQLValueString($_POST['groundtotal'], "text"),
                       GetSQLValueString($_POST['remarks'], "text"),
                       GetSQLValueString($_POST['pid'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}

$colname_notice = "-1";
if (isset($_GET['pid'])) {
  $colname_notice = $_GET['pid'];
}
mysql_select_db($database_conn, $conn);
$query_notice = sprintf("SELECT * FROM notice WHERE pid = %s", GetSQLValueString($colname_notice, "text"));
$notice = mysql_query($query_notice, $conn) or die(mysql_error());
$row_notice = mysql_fetch_assoc($notice);
$totalRows_notice = mysql_num_rows($notice);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="content">
  <div class="post">
    <h2 class="title"><a href="#">Data Form</a></h2>
    <div class="entry">
      <form name="form1" id="form1" method="POST" action="<?php echo $editFormAction; ?>">
        <p>
          <label for="fullname">FULL NAME
            :</label>
          <input type="text" name="fullname" id="fullname" />
        </p>
        <p>
          <label for="address">ADDRESS
            :</label>
          <input type="text" name="address" id="address" />
        </p>
        <p>
          <label for="streetcode">STREET CODE
            :</label>
          <input type="text" name="streetcode" id="streetcode" />
        </p>
        <p>
          <label for="rateyear">RATE YEAR: </label>
          <input type="text" name="rateyear" id="rateyear" />
        </p>
        <p>
          <label for="cadatralzone">CADASTRAL ZONE:</label>
          <input type="text" name="cadatralzone" id="cadatralzone" />
        </p>
        <p>
          <label for="propertyadress">PROPERTY ADDRESS:</label>
          <input type="text" name="propertyadress" id="propertyadress" />
        </p>
        <p>
          <label for="useproperty">USE OF PROPERTY:</label>
          <input type="text" name="useproperty" id="useproperty" />
        </p>
        <p>
          <label for="ratingdistrict">RATING DISTRICT:</label>
          <input type="text" name="ratingdistrict" id="ratingdistrict" />
        </p>
        <p>
          <label for="assesmentno.">ASSESSMENT No:</label>
          <input type="text" name="assesmentno." id="assesmentno." />
        </p>
        <p>
          <label for="annualvalue">ANNUAL VALUE:</label>
          <input type="text" name="annualvalue" id="annualvalue" />
        </p>
        <p>
          <label for="ratenairage">RATE NAIRAGE:</label>
          <input type="text" name="ratenairage" id="ratenairage" />
        </p>
        <p>
          <label for="ratepayable">RATE PAYABLE:</label>
          <input type="text" name="ratepayable" id="ratepayable" />
        </p>
        <p>
          <label for="arrears">ARREARS:</label>
          <input type="text" name="arrears" id="arrears" />
        </p>
        <p>
          <label for="arrearyear">ARREAR YEAR:</label>
          <input type="text" name="arrearyear" id="arrearyear" />
        </p>
        <p>
          <label for="penalty">PENALTY:</label>
          <input type="text" name="penalty" id="penalty" />
        </p>
        <p>
          <label for="prevbalance">PREVIOUS BALANCE:</label>
          <input type="text" name="prevbalance" id="prevbalance" />
        </p>
        <p>
          <label for="groundtotal">GRAND TOTAL:</label>
          <input type="text" name="groundtotal" id="groundtotal" />
        </p>
        <p>
          <label for="remarks">REMARKS:</label>
          <input type="text" name="remarks" id="remarks" />
        </p>
        <p>
          <label for="pid">PID</label>
          <input type="text" name="pid" id="pid" />
        </p>
        <p>
          <input type="submit" name="button" id="button" value="Submit" />
        </p>
        <input type="hidden" name="MM_insert" value="form1" />
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
</body>
</html>
<?php
mysql_free_result($notice);
?>
