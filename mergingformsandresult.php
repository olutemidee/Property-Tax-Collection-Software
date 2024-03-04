<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>merging forms and their results</title>
</head>

<body>
<?php
//if the "submit" does not exist
//form has not been submitted
//display initial page
if(!$_POST['submit'])
{
?>	
//same as  echo $_SERVER['PHP_SELF']
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    
    Enter a number:<input name="number" size="2" />
    <input type="submit" name="submit" value="GO" />
    </form>
    
<?php
}
else
{
//if the "submit" variable exists
//the form has been submitted
//look for and process form data
//display result
$number=$_POST['number'];
if ($number>0)
{
echo 'You entered a positive number';
}
elseif ($number<0)
{
echo 'You entered a negative number';
}
else
{
echo 'You entered 0';
}
}
?>


</body>
</html>
