<?php
//search.php

$connect = new PDO("mysql:host=localhost;dbname=apartments", "root", "");
	
$query = "SELECT DISTINCT Tenant_Apartment FROM tenant ORDER BY Tenant_Name ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Search-like function</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  
  <link href="css/bootstrap-select.min.css" rel="stylesheet" />
  <script src="js/bootstrap-select.min.js"></script>
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Search Function</h2><br />
   
   <select name="multi_search_filter" id="multi_search_filter" multiple class="form-control selectpicker">
   <?php
   foreach($result as $row)
   {
    echo '<option value="'.$row["Tenant_Apartment"].'">'.$row["Tenant_Apartment"].'</option>'; 
   }
   ?>
   </select>
   <input type="hidden" name="hidden_Tenant_Apartment" id="hidden_Tenant_Apartment" />
   <div style="clear:both"></div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>Tenant Name</th>
       <th>SSN</th>
       <th>Phone</th>
       <th>Apartment</th>
      </tr>
     </thead>
     <tbody>
     </tbody>
    </table>
   </div>
   <br />
   <br />
   <br />
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();
 
 function load_data(query='')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('tbody').html(data);
   }
  })
 }

 $('#multi_search_filter').change(function(){
  $('#hidden_Tenant_Apartment').val($('#multi_search_filter').val());
  var query = $('#hidden_Tenant_Apartment').val();
  load_data(query);
 });
 
});
</script>

