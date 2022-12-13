<?php  
include("connect.php");
 $data = json_decode(file_get_contents("php://input"));  

 if(count(array($data)) > 0)  
 {  
      $id = $data->send_id;  
      $query = "DELETE FROM tranzactii WHERE cod='$id'";  
      if(mysqli_query($con, $query))  
      {  
           echo 'Data Deleted';  
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?>  