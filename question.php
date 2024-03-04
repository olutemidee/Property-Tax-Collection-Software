<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><basefont face="Arial, Helvetica, sans-serif" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beginning PhP</title>
</head>

<body>
<h2>Q:&nbsp;This creature can change color to blend in with its surrounding. What is its name?</h2>
<?php
//print output
echo '<h2><i>A: Chameleon</i></h2>';
echo '<h2><i>B: elephant<i></h2>';
echo '<h2><i>C: Tigger<i></h2>';
echo '<h2><i>B: Goat<i></h2>';
?>
<h2>Q:&nbsp;This creature has tusks made of ivory. What is its name?</h2>
<?php
//define variable
$answer='Elephant';
//print output
echo "<h2><i>$answer</i></h2>";
?>
<h2>Q: How old are you?</h2>
<?php
//define variable
$dateofbirth="16/04/1984";
$mybirthdate=$dateofbirth + 13;

//print output
echo "<h2><i>$mybirthdate</i></h2>";
?>
<h2>Q:&nbsp;What is today's date?</h2>
<?php
//define variable
$today="May 24, 2014";
//print output
echo "<h2><i>Today's date is $today</i></h2>";
?>
<?php
//define variables
$auth=true;
$age=27;
$name='Body';
$temp=98.6;
//returns "string"
echo gettype($name);
//returns "boolean"
echo gettype($auth);
//returns "integer"
echo gettype($age);
//returns "double"
echo gettype($temp);
?>
<?php
$identity='James Bond';
$car='BMW';
//would contain the string "James Bond drives a BMW'
$sentence='$identity drives a $car';
?>

</body>
</html>
