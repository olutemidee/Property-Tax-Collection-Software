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
		  $street_code = $filesop[2];
		  $rate_year = $filesop[3];
		  $cadastral_zone= $filesop[4];
		  $property_address= $filesop[5];
		  $property_use= $filesop[6];
		  $rating_district= $filesop[7];
		  $district_prefix= $filesop[8];
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

          $sql = "insert into notice(pid,full_name,street_code,rate_year,cadastral_zone,property_address,property_use,rating_district,district_prefix,
		  assessement_no,annual_value,rate_nairage,rate_payable,arrears,arrears_year,penalty,balance,grand_total) values 
		  ('$pid','$full_name', '$street_code','$rate_year','$cadastral_zone','$property_address','$property_use','$rating_district','$district_prefix'
		  '$assessement_no','$annual_value','$rate_nairage','$rate_payable','$arrears','$arrears_year','$penalty','$balance','$grand_total')";
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