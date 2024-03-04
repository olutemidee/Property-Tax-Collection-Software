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
          $full_name = $filesop[1];
		  $address = $filesop[2];
		  $street_code = $filesop[3];
		  $rate_year = $filesop[4];
		  $cadastral_zone= $filesop[5];
		  $property_address= $filesop[6];
		  $property_use= $filesop[7];
		  $rating_district= $filesop[8];
		  $district_prefix= $filesop[9];
		  $assessement_no= $filesop[10];
		  $annual_value = $filesop[11];
		  $rate_nairage = $filesop[12];
		  $rate_payable = $filesop[13];
		  $arrears = $filesop[14];
		  $arrears_year = $filesop[15];
		  $penalty= $filesop[16];
		  $balance= $filesop[17];
		  $grand_total= $filesop[18];

          $sql = "update notice set 
		  full_name='$full_name', 
		  address='$address',
		  street_code='$street_code',
		  rate_year='$rate_year',
		  cadastral_zone='$cadastral_zone',
		  property_address='$property_address',
		  property_use='$property_use',
		  rating_district='$rating_district',
		  district_prefix='$district_prefix',
		  assessement_no='$assessement_no',
		  annual_value='$annual_value',
		  rate_nairage='$rate_nairage',
		  rate_payable='$rate_payable',
		  arrears='$arrears',
		  arrears_year='$arrears_year',
		  penalty='$penalty',
		  balance='$balance',
		  grand_total='$grand_total' 
		  WHERE pid='$pid'";
          $stmt = mysqli_prepare($conn,$sql);
          mysqli_stmt_execute($stmt);

         $c = $c + 1;
		        }

            if($sql){
               echo "sucess";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }

}


?>