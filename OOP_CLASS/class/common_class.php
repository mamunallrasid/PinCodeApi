<?php
require_once("user.php");
// ................... Main Class ......................
class Main_Class extends User_Class 
{
	var $conn;
	public function __construct()
   {
    $this->conn= new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    if(! $this->conn)
    {
      die("Database Not Found"); 
    }
    else
    {

       session_start();
    }
  }

    public function insert($data){

       return $this->conn->query($data);
    }

    public function total_row($sql)
    {
      $query= $this->conn->query($sql);
      if($query->num_rows >0)
      {  
        return $query->num_rows; 
      }
      else
       {
          return false;
       }

    }
    public function fetch_data($sql){
       $query= $this->conn->query($sql);
        if($query->num_rows>0)
        {    
            $data = array(); 
            while($result = $query->fetch_array(MYSQLI_ASSOC))
             {
                $data[] = $result;
             }
          return $data;    
        }
        else{
            return false;
        }   

    }

    public function single_row_fetch($sql){
       $query= $this->conn->query($sql);
        if($query->num_rows>0)
        {    
        
            while($result = $query->fetch_array(MYSQLI_ASSOC))
             {
               return $result; 
             }
             
        }
        else{
            return false;
        }   

    }

    public function getApiResponse($url)
    {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $json_response = curl_exec($curl);
      return $json_response;
    }

// Exit Class
}

?>