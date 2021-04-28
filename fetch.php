<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=apartments", "root", "");

if($_POST["query"] != '')
{
 $search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "
 SELECT * FROM tenant
 WHERE Tenant_Apartment IN (".$search_text.") 
 ORDER BY Tenant_Name DESC
 ";
}
else
{
 $query = "SELECT * FROM tenant ORDER BY Tenant_Name DESC";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["Tenant_Name"].'</td>
   <td>'.$row["Tenant_SSN"].'</td>
   <td>'.$row["Tenant_Phone"].'</td>
   <td>'.$row["Tenant_Apartment"].'</td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;


?>