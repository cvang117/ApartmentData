<?php  
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "apartments";
	
	//$link = mysqli_connect("localhost", "root", "", "apartments");
	
	//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);  
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	//$conn = mysqli_connect($dbhost, $dbname, $dbssn, $dbpho, $dbapt, $db);  
	if(!$conn){  
		die('Could not connect: '.mysqli_connect_error());  
	}  
	echo 'Connected successfully<br/>';  
	
	$Tenant_Name = $_POST['Tenant_Name'];
	$Tenant_SSN = $_POST['Tenant_SSN'];
	$Tenant_Phone = $_POST['Tenant_Phone'];
	$Tenant_Apartment = $_POST['Tenant_Apartment'];
	
	//$sql = "INSERT INTO tenant(Tenant_Name,Tenant_SSN,Tenant_Phone, Tenant_Apartment)
	//VALUES ('$Tenant_Name', '$Tenant_SSN', '$Tenant_Phone', '$Tenant_Apartment')";  	
	$sql = "DELETE from tenant WHERE Tenant_SSN = '$Tenant_SSN' OR Tenant_Apartment = '$Tenant_Apartment'
	OR Tenant_Name = 'Tenant_Name' OR Tenant_Phone = 'Tenant_Phone'";
	
	if(mysqli_query($conn, $sql)){  
		echo "Record deletion successfully";  
	}else{  
		echo "Could not delete record: ". mysqli_error($conn);  
	}  

	//if(mysqli_query($conn, $sql)){  
		//echo "Record inserted successfully"; 
		//header('location
	
	
mysqli_close($conn);  

?>  

<a href="Delete.html"><button>Back</button></a>
<a href="main_page1.html"><button>Main Page</button></a>