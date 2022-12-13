<?php  
include("connect.php");
 $data = json_decode(file_get_contents("php://input"));  
 
 if(count(array($data)) > 0)  
 
 {  
      $produs = mysqli_real_escape_string($con, $data->produs);       
      $client = mysqli_real_escape_string($con, $data->client);
      $cantitate = mysqli_real_escape_string($con, $data->cantitate);
      $semn = mysqli_real_escape_string($con, $data->semn);
   
      $query = "INSERT INTO tranzactii(cod, data, cod_prod, cod_cumparator, cantitate, semn_en_gros) VALUES(NULL, CURRENT_DATE,$produs,$client,$cantitate,'$semn')";  
      if(mysqli_query($con, $query))  
      {  
           echo "Data Inserted...";  
      }  
      else  
      {  
           echo 'Error';  
      }  
     
 }  
 ?>  