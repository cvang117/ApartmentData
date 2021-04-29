<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "apartments");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
if(isset($_REQUEST["term"])){
    $sql = "SELECT * FROM tenant WHERE Tenant_Name LIKE ?";
    
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("s", $param_term);
        $param_term = $_REQUEST["term"] . '%';
 
        if($stmt->execute()){
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    echo "<p> Name: " . $row["Tenant_Name"] ." SSN: ". $row["Tenant_SSN"] . " Phone: "
					. $row["Tenant_Phone"] . " Apartment#: " .$row["Tenant_Apartment"] . "</p>";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
}
 
$mysqli->close();
?>