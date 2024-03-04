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

mysql_select_db($database_amac_connection, $amac_connection);
$query_query_pid = "SELECT * FROM notice";
$query_pid = mysql_query($query_query_pid, $amac_connection) or die(mysql_error());
$row_query_pid = mysql_fetch_assoc($query_pid);
$totalRows_query_pid = mysql_num_rows($query_pid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php do { ?>
  <div align="center">
    <table width="733" height="38" border="3">
      <tr>
        <td width="483"><?php echo $row_query_pid['full_name']; ?></td>
        <td width="243"><?php echo $row_query_pid['pid']; ?></td>
      </tr>
    </table>
  </div>
  <?php } while ($row_query_pid = mysql_fetch_assoc($query_pid)); ?>
  <?php if ($totalRows_query_pid > 0) { // Show if recordset not empty ?>
  <table width="200" border="1">
    <tr>
      <td><?php echo $row_query_pid['remark']; ?></td>
    </tr>
    </table>
  <?php } // Show if recordset not empty ?>
</body>
</html>
<?php
mysql_free_result($query_pid);
?>
