<?php
class Admin_Class
{
	// Login Session Checking
    public function login_session_Check()
      {
      if(isset($_SESSION['Admin_logged_in']))
      {
        redirect(Root().'admin/Dashboard/dashboard.php');
      }
    } 

    public function admin_session_private()
    {
      if(!isset($_SESSION['Admin_logged_in']))
      {
        redirect(Root().'admin');
      }
    }

    public function All_Ncert_Summ_Class()
	  {
	    
	    $sql = "SELECT `Class_Id`, `Class_Name` FROM `tbl_ncert_summ_class` WHERE Class_Flag !='0' ORDER BY Class_Name ASC";
	    $result = $this->conn->query($sql);
	     if($result->num_rows>0)
	     {
	            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
	             {
	                $output .= '<option value="'.$fetch['Class_Id'].'">'.ucwords($fetch['Class_Name']).'</option>';
	             } 
	            return $output;
	       }

	  }

	public function All_Ncert_Summ_Subject()
	  {
	    
	    $sql = "SELECT `Sub_Id`, `Sub_Name` FROM `tbl_ncert_summ_subject` WHERE Sub_Flag!='0' ORDER BY Sub_Name ASC";
	    $result = $this->conn->query($sql);
	     if($result->num_rows>0)
	     {
	          $output='';
	            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
	             {
	                $output .= '<option value="'.$fetch['Sub_Id'].'">'.ucwords($fetch['Sub_Name']).'</option>';
	             } 
	            return $output;
	       }

	  }

	public function All_Ncert_MCQ_Summ_Class()
	  {
	    
	    $sql = "SELECT `Class_Id`, `Class_Name` FROM `tbl_ncert_mcq_summ_class` WHERE Class_Flag !='0' ORDER BY Class_Name ASC";
	    $result = $this->conn->query($sql);
	     if($result->num_rows>0)
	     {
	            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
	             {
	                $output .= '<option value="'.$fetch['Class_Id'].'">'.ucwords($fetch['Class_Name']).'</option>';
	             } 
	            return $output;
	       }

	  }

	public function All_Ncert_MCQ_Summ_Subject()
	  {
	    
	    $sql = "SELECT `Sub_Id`, `Sub_Name` FROM `tbl_ncert_mcq_summ_subject` WHERE Sub_Flag!='0' ORDER BY Sub_Name ASC";
	    $result = $this->conn->query($sql);
	     if($result->num_rows>0)
	     {
	          $output='';
	            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
	             {
	                $output .= '<option value="'.$fetch['Sub_Id'].'">'.ucwords($fetch['Sub_Name']).'</option>';
	             } 
	            return $output;
	       }

	  }

}
?>