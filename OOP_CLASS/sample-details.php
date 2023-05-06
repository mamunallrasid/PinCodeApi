<?php
require_once("db-connect/connect.php");
require_once("class/common_class.php");
require_once("function/function.php");

$server = new Main_Class();


// ///////////////////// USER PAGE /////////////////////

//echo $server->User_Page("Bapi Swarnakar");

// ///////////////////// ADMIN PAGE /////////////////////

//echo $server->Admin_Page("Bapi Swarnakar");


// ///////////////////COMMON PAGE ////////////////////////////////////

/////////////////////// DATA INSERT /////////////////////////////////

// $insert = "INSERT INTO `tbl_advice_medicine`(`AM_Name`, `AM_Status`) VALUES ('Biki Swarnakar','1')";
// if($server->insert($insert))
// {
//   echo "Data Inserted";
// }
// else
// {
//   echo "Not Inserted";
// }


///////////////////// BIND DATA INSERT  //////////////////

// OR

// $name = "Bapi";
// $status = "1";
// $insert = $server->conn->prepare("INSERT INTO `tbl_advice_medicine`(`AM_Name`, `AM_Status`) VALUES (? , ?)");
// $insert->bind_param("ss", $name, $status); // ss- means number of variable pass
// if($insert->execute())
// {
//   echo "Data Inserted";
// }
// else
// {
//   echo "Not Inserted";
// }

///////////////////// MULTIPLE OR SINGLE DATA FETCH ////////////////////////////////////////////

//  $fetch_sql = "SELECT `AM_ID`, `AM_Name`, `AM_Status`, `AM_Date` FROM `tbl_advice_medicine`";
// if($result = $server->fetch_data($fetch_sql))
// {
  
//    foreach ($result as $value) {
//      echo $value['AM_Name']."<br>";
//    }
// }
// else
// {
//   echo "Data Not Found";
// }


/////////////////////////// TOTAL NO OF ROW  //////////////////////////

// $row_sql = "SELECT `AM_ID`, `AM_Name`, `AM_Status`, `AM_Date` FROM `tbl_advice_medicine`";
// if($result = $server->total_row($row_sql))
// {
//    echo $result;
// }
// else
// {
//   echo "Not Row Found";
// }

///////////////////// SINGLE ROW  DATA FETCH ////////////////////////////////////////////

// $single_sql = "SELECT MAX(AM_ID)AM_ID FROM `tbl_advice_medicine`";
// if($result = $server->single_row_fetch($single_sql))
// {
//    echo $result['AM_ID'];
   
// }
// else
// {
//   echo "Data Not Found";
// }


///////////////////////////////// CLEAN DATA ///////////////////

// $val = '<p>hello world</p>';
// echo clean_data($val);








////////////// FUNCTION PAGE ADD FUNCTION ////////////////////////////

//hello()// hello() create function page
//echo hello("BAPI SWARNAKAR");

// echo random_userid();
?>

