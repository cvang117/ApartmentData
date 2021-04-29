<?php
	//$con= new mysqli("localhost","root","","apartments");
    //$name = $_post['search'];
    //$query = "SELECT * FROM employees
   // WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";

  /*  // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM apartments
    WHERE Tenant_Name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'");

while ($row = mysqli_fetch_array($result))
{
       // echo $row['first_name'] . " " . $row['last_name'];
		echo $row['Tenant_Name'];
        echo "<br>";
}
    mysqli_close($con);
	
*/

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "apartments";
	
	//$link = mysqli_connect("localhost", "root", "", "apartments");
	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	//$conn = mysqli_connect($dbhost, $dbname, $dbssn, $dbpho, $dbapt, $db);  
	if(!$conn){  
		die('Could not connect: '.mysqli_connect_error());  
	}  
	echo 'Connected successfully<br/>';  
	
	//$Tenant_Name = $_POST['Tenant_Name'];
	//$Tenant_Apartment = $_POST['Tenant_Apartment'];
	//$Tenant_Apartment = $_POST['Tenant_Apartment'];


	$sql = "SELECT * FROM tenant WHERE Tenant_Name LIKE '%search%'
	OR Tenant_Apartment LIKE '%search%'";
	$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
	//if($result = mysqli_query($conn, $sql))
{
       // echo $row['first_name'] . " " . $row['last_name'];
		echo "Name: " .$_POST["search"]. nl2br("\r\nApartment#: ") .$_POST["search"] ?? "";	
        echo "<br>";
}

//else{
//	echo "No tenant match";
//}

/*

$search = $_REQUEST['search'];
$sqli = "SELECT ID FROM posts WHERE username LIKE %$search% OR subject LIKE %$search% OR content LIKE %$search%";
//$dblink = mysql_connect("localhost", "mysql_user", "mysql_password");
//mysql_select_db("DB1", $dblink); $result = mysql_query($sql, $dblink);
while ($row = mysql_fetch_assoc($result)) {

}
*/



mysqli_close($conn);
	
    ?>
	
	
	<input type="button" value="Back" onclick="history.back()">