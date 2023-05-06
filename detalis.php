<?php
 require_once("OOP_CLASS/db-connect/connect.php");
 require_once("OOP_CLASS/class/common_class.php");
$obj = new Main_Class();
if(isset($_POST['action']))
{
    $pin_code=$_POST['pincode'];
    $url="https://api.postalpincode.in/pincode/".$pin_code;
    $res = $obj->getApiResponse($url);
    $data=json_decode($res,true);
    $gp="";
    $block="";
    $District="";
    if($data[0]['Status']=="Success")
    {
        foreach($data[0]['PostOffice'] as $data =>$key)
        {
       $gp.="<option value='{$key['Name']}'>{$key['Name']}</option>";
       $block=$key['Block'];
       $District=$key['District'];
        }
        
    }
    else
    {
        $gp.="<option>No Record Found</option>";
    }
     $alldata=array(
      "Grampanchayet"=>$gp,
      "Block"=>$block,
      "District"=>$District,
     );
    echo Json_encode($alldata);

}

?>