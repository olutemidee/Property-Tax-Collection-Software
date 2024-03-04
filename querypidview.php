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
$query_query_pid = "SELECT * FROM notice ORDER BY remark DESC";
$query_pid = mysql_query($query_query_pid, $amac_connection) or die(mysql_error());
$row_query_pid = mysql_fetch_assoc($query_pid);
mysql_select_db($database_amac_connection, $amac_connection);
$query_query_pid = "SELECT * FROM notice WHERE remark LIKE 'P%' ORDER BY remark ASC";
$query_pid = mysql_query($query_query_pid, $amac_connection) or die(mysql_error());
$row_query_pid = mysql_fetch_assoc($query_pid);
mysql_select_db($database_amac_connection, $amac_connection);
$query_query_pid = "SELECT * FROM notice WHERE remark LIKE '%p%' ORDER BY remark ASC";
$query_pid = mysql_query($query_query_pid, $amac_connection) or die(mysql_error());
$row_query_pid = mysql_fetch_assoc($query_pid);
$totalRows_query_pid = mysql_num_rows($query_pid);
$query_query_pid = "SELECT * FROM notice";
$query_pid = mysql_query($query_query_pid, $amac_connection) or die(mysql_error());
$row_query_pid = mysql_fetch_assoc($query_pid);
$totalRows_query_pid = mysql_num_rows($query_pid);
$query_query_pid = "SELECT * FROM notice ORDER BY remark ASC";
$query_pid = mysql_query($query_query_pid, $amac_connection) or die(mysql_error());
$row_query_pid = mysql_fetch_assoc($query_pid);
$totalRows_query_pid = mysql_num_rows($query_pid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PID List</title>
</head>

<body>
<?php do { ?>
  <div align="center"><br />
    <table width="908" border="1">
      <tr>
        <td><?php echo $row_query_pid['full_name']; ?></td>
        <td><?php echo $row_query_pid['address']; ?></td>
        <td><?php echo $row_query_pid['pid']; ?></td>
        </tr>
      </table>
  </div>
  <?php } while ($row_query_pid = mysql_fetch_assoc($query_pid)); ?>
  Total Records: 
<?php echo $totalRows_query_pid ?>
</body>
</html>
<?php
mysql_free_result($query_pid);
?>
