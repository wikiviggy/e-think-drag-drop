<?php
session_start();
$servername='localhost';
$username='root';
$password='mysql123';
$dbname='test';
$response=$_POST['xyz'];
$conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }       
$sql= mysqli_query($conn,"insert into response values('$response') ");
$query = $conn->prepare($sql);
$query->execute(array(':data' => $response));
echo json_encode($response); 
?>
