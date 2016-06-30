<?php

class pagingclass extends MY_Model{
     //private $db;
 
 function __construct()
 { 
  parent::__construct('questions');
}

function index()
{

}
function paging($query,$records_per_page)
{
  $starting_position=0;
  if(isset($_GET["page_no"]))
  {
   $starting_position=($_GET["page_no"]-1)*$records_per_page;
 }
 $query2=$query." limit $starting_position,$records_per_page";
 return $query2;
}

public function paginglink($query,$records_per_page)
{    

 // echo $query ."<br>".$records_per_page."<br><br>";
  
  $self = $_SERVER['PHP_SELF'];
  
  $stmt = $this->conn_id->prepare($query);
  $r=$stmt->execute();
  $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($r);
  $total_no_of_records = $stmt->rowCount();
  
  if($total_no_of_records > 0)
  {
    $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
            //echo $total_no_of_pages;
    echo "Page bar:  ";
    $current_page=1;
    if(isset($_GET["page_no"]))
    {
     $current_page=$_GET["page_no"];
   }
   if($current_page!=1)
   {
     $previous =$current_page-1;
     echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
     echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
   }
   for($i=1;$i<=$total_no_of_pages;$i++)
   {
    if($i==$current_page)
    {
      echo "<strong><a href='".$self."?page_no=".$i."' style='color:red;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
    }
    else
    {
      echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
    }
  }
  if($current_page!=$total_no_of_pages)
  {
    $next=$current_page+1;
    echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
    echo "<a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
  }
}

}
}

?>