<?php
    $con= new mysqli("localhost","root","","Employee");
    $name = $_post['search'];
    //$query = "SELECT * FROM employees
   // WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
$result = mysqli_query($con, "SELECT * FROM employees
    WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'");

while ($row = mysqli_fetch_array($result))
{
        echo $row['first_name'] . " " . $row['last_name'];
        echo "<br>";
}
    mysqli_close($con);
    ?>