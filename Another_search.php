<?php
//search.php

$connect = new PDO("mysql:host=localhost;dbname=apartments", "root", "");
	
$query = "SELECT DISTINCT Tenant_Name FROM tenant ORDER BY Tenant_Name ASC";
//$query = "SELECT DISTINCT Apartment_Name FROM apartment ORDER BY Apartment_Name ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

/*
$sql = "SELECT COUNT(DISTINCT Tenant_Name) FROM tenant";
if(mysqli_query($connect, $query)){
	echo "Tenant_Name";
}else{
	echo "Not available";
}

*/
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
   <h2 align="center">Tenant List</h2><br />

<!--
<body>
	<form action="backend-search.php" method="GET">
		<input type="text" name="query" />
		<input type="submit" value="Search" />
	</form>
	
</body>

-->
<style>
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 1000px;
        position: relative;
        display: inline-block;
        font-size: 18px;
    }
    .search-box input[type="text"]{
        height: 48px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 18px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
		background-color : #f8f8ff; 
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

</head>
<body>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search name" />
        <div class="result"></div>
    </div>
</body>
</head>
</html>
  
  <!--<select name="multi_search_filter" id="multi_search_filter" multiple class="form-control selectpicker">-->

  <?php
  /*
   foreach($result as $row)
   {
    echo '<option value="'.$row["Tenant_Name"].'">'.$row["Tenant_Name"].'</option>'; 
   }
   */
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
       <th>Apartment Number</th>
	   <th>Apartment Name</th>
	   <th>Signed Date</th>
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



