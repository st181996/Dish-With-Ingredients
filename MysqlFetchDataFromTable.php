<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = "Database for Dish";
$conn = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
);
	
if ($conn->connect_error) {
    echo 'Error: '.$conn->connect_error;
    exit();
}

echo 'Success: A proper connection to MySQL was made.';
echo '<br>';
echo 'Host information: '.$conn->host_info;
echo '<br>';
echo 'Protocol version: '.$conn->protocol_version;
echo '<br>';

//code for fetching data from Database
        
$sql = "SELECT * FROM Dish";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th>id</th>
            <th>dishname</th>
            <th>dishcolour</th>
            <th>dishprice</th>
            <th>dishingredients</th>
        </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["dishname"] . "</td><td>" . $row["dishcolour"] . "</td><td>" . $row["dishprice"] . "</td><td>" . $row["dishingredients"] .  "</td></tr>";
    }
    echo "</table";         
} else {
    echo "0 results";
}

$conn->close();