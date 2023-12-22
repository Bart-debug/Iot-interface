<?php
$servername = "iotgroup5.database.windows.net";
$username = "CloudSA8e466240";
$password = "******"; #Our password
$dbname = "IotBase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dataType = $_GET['type'];
$sql = "SELECT $dataType FROM humidity_temperature_data";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row[$dataType];
    }
}

$conn->close();

echo json_encode($data);
?>
