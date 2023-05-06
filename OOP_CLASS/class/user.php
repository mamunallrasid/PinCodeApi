<?php
require_once("admin.php");
/**
 * 
 */
class User_Class extends Admin_Class
{
	
	// NCERT SUMM MENU
  public function All_NCERT_Summeries_Menu()
  {
     $sql = "SELECT `Sub_Id`, `Sub_Name`, `Sub_Flag`, `Sub_Date` FROM `tbl_ncert_summ_subject` WHERE Sub_Flag!='0'  ORDER BY Sub_Name ASC";
     $result = $this->conn->query($sql);
     if($result->num_rows>0)
     {
        $output='';
        while($fetch = $result->fetch_array(MYSQLI_ASSOC))
        {
          $output .= '<li><a href="#">'.$fetch['Sub_Name'].'</a>
                       <ul class="dropdown">';
          
          $output .= ''.$this->All_NCERT_Class($fetch['Sub_Id']).'';             

          $output .='<li></ul>';
        }
      return $output; 
     }
  }


  public function All_NCERT_Class($sub_id)
  {
    //$sql = "SELECT `Class_Id`, `Class_Name` FROM `tbl_ncert_summ_class` WHERE Class_Flag !='0' ORDER BY Class_Name ASC";
    $sql = "SELECT `Sum_Id`,tbl_ncert_summ_class.Class_Id,tbl_ncert_summ_class.Class_Name FROM `tbl_ncert_summeries`INNER JOIN tbl_ncert_summ_class ON tbl_ncert_summ_class.Class_Id=tbl_ncert_summeries.Class_Id WHERE tbl_ncert_summeries.Sub_Id='$sub_id' GROUP BY tbl_ncert_summ_class.Class_Id";
     $result = $this->conn->query($sql);
     if($result->num_rows>0)
     {
        $output='';
        while($fetch = $result->fetch_array(MYSQLI_ASSOC))
        {
          $output .= '<li><a href="'.root().'ncert_summeries/'.getstring('NCERT SUMMERIES').'/'.base64_encode($sub_id).'/'.base64_encode($fetch['Class_Id']).'">'.$fetch['Class_Name'].'</a></li>';           
        }
      return $output; 
     }
  }


  // EXIT NCERT MENU

   // NCERT MCQ SUMM MENU
  public function All_NCERT_MCQ_Summeries_Menu()
  {
     $sql = "SELECT `Sub_Id`, `Sub_Name`, `Sub_Flag`, `Sub_Date` FROM `tbl_ncert_mcq_summ_subject` WHERE Sub_Flag!='0'  ORDER BY Sub_Name ASC";
     $result = $this->conn->query($sql);
     if($result->num_rows>0)
     {
        $output='';
        while($fetch = $result->fetch_array(MYSQLI_ASSOC))
        {
          $output .= '<li><a href="#">'.$fetch['Sub_Name'].'</a>
                       <ul class="dropdown">';
          
          $output .= ''.$this->All_NCERT_MCQ_Class($fetch['Sub_Id']).'';             

          $output .='<li></ul>';
        }
      return $output; 
     }
  }


  public function All_NCERT_MCQ_Class($sub_id)
  {
    //$sql = "SELECT `Class_Id`, `Class_Name` FROM `tbl_ncert_summ_class` WHERE Class_Flag !='0' ORDER BY Class_Name ASC";
    $sql = "SELECT `Sum_Id`,tbl_ncert_mcq_summ_class.Class_Id,tbl_ncert_mcq_summ_class.Class_Name FROM `tbl_ncert_mcq_summeries`INNER JOIN tbl_ncert_mcq_summ_class ON tbl_ncert_mcq_summ_class.Class_Id=tbl_ncert_mcq_summeries.Class_Id WHERE tbl_ncert_mcq_summeries.Sub_Id='$sub_id' GROUP BY tbl_ncert_mcq_summ_class.Class_Id";
     $result = $this->conn->query($sql);
     if($result->num_rows>0)
     {
        $output='';
        while($fetch = $result->fetch_array(MYSQLI_ASSOC))
        {
          $output .= '<li><a href="'.root().'ncert_summeries/'.getstring('NCERT MCQ SUMMERIES').'/'.base64_encode($sub_id).'/'.base64_encode($fetch['Class_Id']).'">'.$fetch['Class_Name'].'</a></li>';           
        }
      return $output; 
     }
  }

  public function All_Blog()
    {
      $sql = "SELECT `Blog_Id`, `Blog_Title`, `Blog_Image`, `Blog_Desc`, `Blog_Flag`,DATE_FORMAT(Blog_Added,'%d-%m-%Y')Blog_Added FROM `tbl_blog` ORDER BY Blog_Id DESC";
       $result = $this->conn->query($sql);
       if($result->num_rows>0)
       {
            $output='';
              while($fetch = $result->fetch_array(MYSQLI_ASSOC))
               {
                  $output .= '<div class="item">
                <article class="post clearfix maxwidth600 mb-sm-30">
                  <div class="entry-header">
                    <div class="post-thumb thumb"> <img src="'.root().'images/blog/'.$fetch['Blog_Image'].'" alt="" class="img-responsive img-fullwidth"> </div>
                    
                  </div>
                  <div class="entry-content bg-white border-1px p-20">
                    <h5 class="entry-title mt-0 pt-0"><a href="#">'.$fetch['Blog_Title'].'</a></h5>
                    <p class="text-left mb-20 mt-15 font-13">'.$fetch['Blog_Desc'].'</p>
                    <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="#">Read more</a>
                    <ul class="list-inline entry-date pull-right font-12 mt-5">
                      <li><a class="text-theme-colored" href="#">Admin |</a></li>
                      <li><span class="text-theme-colored">'.$fetch['Blog_Added'].'</span></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </article>
              </div>';
               } 
              return $output;
         }
    }


   public function All_Full_Summeries($subject,$class,$type)
  {
    if($type !='NCERT MCQ SUMMERIES')
    {
      $sql = "SELECT `Sum_Id`,ROW_NUMBER() OVER(ORDER BY (SELECT 1)) AS Sl_no,tbl_ncert_summ_class.Class_Name,tbl_ncert_summ_subject.Sub_Name,`Sum_Type`,`Sum_Chapter`,`Sum_Pdf`,DATE_FORMAT(Sum_Date,'%d-%m-%Y %h:%i')Sum_Date FROM `tbl_ncert_summeries` INNER JOIN tbl_ncert_summ_subject ON tbl_ncert_summ_subject.Sub_Id=tbl_ncert_summeries.Sub_Id INNER JOIN tbl_ncert_summ_class ON tbl_ncert_summeries.Class_Id=tbl_ncert_summ_class.Class_Id WHERE tbl_ncert_summeries.Sum_Type='Full Summeries'
       AND tbl_ncert_summeries.Sub_Id ='$subject' AND tbl_ncert_summeries.Class_Id='$class'";
    }
    else
    {

      $sql = "SELECT `Sum_Id`,ROW_NUMBER() OVER(ORDER BY (SELECT 1)) AS Sl_no,tbl_ncert_mcq_summ_class.Class_Name,tbl_ncert_mcq_summ_subject.Sub_Name,`Sum_Type`,`Sum_Chapter`,`Sum_Pdf`,DATE_FORMAT(Sum_Date,'%d-%m-%Y %h:%i')Sum_Date FROM `tbl_ncert_mcq_summeries` INNER JOIN tbl_ncert_mcq_summ_subject ON tbl_ncert_mcq_summ_subject.Sub_Id=tbl_ncert_mcq_summeries.Sub_Id INNER JOIN tbl_ncert_mcq_summ_class ON tbl_ncert_mcq_summeries.Class_Id=tbl_ncert_mcq_summ_class.Class_Id WHERE tbl_ncert_mcq_summeries.Sum_Type='Full Summeries' AND  tbl_ncert_mcq_summeries.Sub_Id ='$subject' AND tbl_ncert_mcq_summeries.Class_Id='$class'";

    }
     
     $result = $this->conn->query($sql);
     if($result->num_rows>0)
     {
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                $output .= '
                      <tr class="text-center"> 
                        <th scope="row" class="text-center">'.$fetch['Sl_no'].'</th> 
                        <td>'.$fetch['Class_Name'].'</td> 
                        <td>'.$fetch['Sub_Name'].'</td> 
                        <td><a href="images/NCERT/ncert-summeries/'.$fetch['Sum_Pdf'].'" class="btn btn-success" target="blank"><i class="fas fa-download"></i></a></td> 
                      </tr>';
             } 
            return $output;
       }
  }


  public function All_Chapterwise_Summeries($subject,$class,$type)
  {
    if($type !='NCERT MCQ SUMMERIES')
    {
      $sql = "SELECT `Sum_Id`,ROW_NUMBER() OVER(ORDER BY (SELECT 1)) AS Sl_no,tbl_ncert_summ_class.Class_Name,tbl_ncert_summ_subject.Sub_Name,`Sum_Type`,`Sum_Chapter`,`Sum_Pdf`,DATE_FORMAT(Sum_Date,'%d-%m-%Y %h:%i')Sum_Date FROM `tbl_ncert_summeries` INNER JOIN tbl_ncert_summ_subject ON tbl_ncert_summ_subject.Sub_Id=tbl_ncert_summeries.Sub_Id INNER JOIN tbl_ncert_summ_class ON tbl_ncert_summeries.Class_Id=tbl_ncert_summ_class.Class_Id WHERE tbl_ncert_summeries.Sum_Type='Chapterwise Summeries' AND  tbl_ncert_summeries.Sub_Id ='$subject' AND tbl_ncert_summeries.Class_Id='$class'";
    }
    else
    {
      $sql = "SELECT `Sum_Id`,ROW_NUMBER() OVER(ORDER BY (SELECT 1)) AS Sl_no,tbl_ncert_mcq_summ_class.Class_Name,tbl_ncert_mcq_summ_subject.Sub_Name,`Sum_Type`,`Sum_Chapter`,`Sum_Pdf`,DATE_FORMAT(Sum_Date,'%d-%m-%Y %h:%i')Sum_Date FROM `tbl_ncert_mcq_summeries` INNER JOIN tbl_ncert_mcq_summ_subject ON tbl_ncert_mcq_summ_subject.Sub_Id=tbl_ncert_mcq_summeries.Sub_Id INNER JOIN tbl_ncert_mcq_summ_class ON tbl_ncert_mcq_summeries.Class_Id=tbl_ncert_mcq_summ_class.Class_Id WHERE tbl_ncert_mcq_summeries.Sum_Type='Chapterwise Summeries' AND  tbl_ncert_mcq_summeries.Sub_Id ='$subject' AND tbl_ncert_mcq_summeries.Class_Id='$class'";
    }
     
     $result = $this->conn->query($sql);
     if($result->num_rows>0)
     {
           $output='';
            while($fetch = $result->fetch_array(MYSQLI_ASSOC))
             {
                $output .= '
                      <tr class="text-center"> 
                        <th scope="row" class="text-center">'.$fetch['Sl_no'].'</th> 
                        <td>'.$fetch['Class_Name'].'</td> 
                        <td>'.$fetch['Sub_Name'].'</td>
                        <td>'.$fetch['Sum_Chapter'].'</td> 
                        <td><a href="images/NCERT/ncert-summeries/'.$fetch['Sum_Pdf'].'" class="btn btn-success" target="blank"><i class="fas fa-download"></i></a></td> 
                      </tr>';
             } 
            return $output;
       }
  }





// Exit Class
}
?>