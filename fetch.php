<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=apartments", "root", "");

if($_GET["query"] = '')
{
 $search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "
 SELECT * FROM tenant, lives_in
 WHERE Tenant_Name IN (".$search_text.") 
 ORDER BY Tenant_Name DESC";

 
 //$query = "
 //SELECT * FROM tenant
 //WHERE Tenant_Apartment IN (".$search_text.") 
 //ORDER BY Tenant_Name DESC
 //";
/* 	$query = $_GET['query']; 
	$min_length = 3;
	
	
	if(strlen($query) >= $min_length){		
		$query = htmlspecialchars($query); 
		
		$query = mysql_real_escape_string($query);
				
		$raw_results = mysql_query("SELECT * FROM tenant, lives_in
			WHERE (`Tenant_Name` = '$query') OR (`Apartment_Name` == '$query')") or die(mysql_error());
			
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysql_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo "<p><h3>".$results['Tenant_Name']."</h3>".$results['Apartment_Name']."</p>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
	*/
	
}
else
{
/*
 $query = "SELECT * FROM tenant
 JOIN lives_in ON tenant.Tenant_Apartment != lives_in.Tenant_Apartment
 UNION
 SELECT * FROM tenant
 RIGHT JOIN lives_in ON tenant.Tenant_Apartment != lives_in.Tenant_Apartment";
 */
 $query = "SELECT * FROM tenant
 LEFT JOIN lives_in ON lives_in.Tenant_Apartment = tenant.Tenant_Apartment";
 //UNION ALL
 //SELECT * FROM tenant
 //RIGHT OUTER JOIN lives_in ON lives_in.Tenant_Apartment = tenant.Tenant_Apartment
 //WHERE lives_in.Tenant_Apartment is null";

 //$query = "SELECT * FROM tenant ORDER BY Tenant_Name DESC";
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
   <td>'.$row["Apartment_Name"].'</td>
   <td>'.$row["Signed_Date"].'</td>
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