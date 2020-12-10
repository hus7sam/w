<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "w";
try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $error){

    echo $error->getMessage();
}
// Create connection



//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
?>