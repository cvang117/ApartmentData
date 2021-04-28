<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "apartments";
	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
	//Get values pass from fomr in landlord_login.php file
	$Landlord_Name = $_POST['username'];
	$password = $_POST['password'];

	
	//Query the database for user
	$sql = "SELECT * FROM landlord WHERE Landlord_Name = '$Landlord_Name' AND password = '$password'";
	//$sql = "SELECT * FROM apartment INNER JOIN landlord WHERE Landlord_Name = '$Landlord_Name' AND password = '$password'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if($Landlord_Name == "" && $password == ""){
		header('location:landlord.html');
	}
	
	if($row['Landlord_Name'] == $Landlord_Name && $row['password'] == $password ){
		//echo "Login success! Welcome ".$Landlord_Name;
		//header('location:landlord_pg1.html');
		echo "Login success! Welcome ".$Landlord_Name."!\n\n\n\n\n\n\n";
		//header("Refresh:5; url=register.php");
		echo "You will be redirected in 5 seconds";
		header('Refresh:5; url=main_page1.html');
	}
	else{
		echo "Failed to login!";
		//header('location:landlord.html');
		//echo "Failed to login!";

	}	
	//if($row['Landlord_Name'] == $Landlord_Name && $row['password'] == $password ){
	//	header('location:landlord_pg1.html');
	//}
	
	//header('location:landlord_pg1.html');
	
	mysqli_close($conn);

?>