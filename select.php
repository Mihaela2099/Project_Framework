<?php  
include("connect.php");

 $output = array();  

 $query = "Select  t.cod, m.image, m.name, m.pret_en_gros,m.pret_amanuntul,c.pers_de_contact, t.semn_en_gros
        from marfa m 
        inner join tranzactii t on t.cod_prod= m.Cod 
        inner join cumparator c on c.cod= t.cod_cumparator;";  
 
 
 $result = mysqli_query($con, $query);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>  