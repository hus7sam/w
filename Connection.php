<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "w";

try {
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    );
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword,$options);


}catch (PDOException $error){

    echo $error->getMessage();
}
// Create connection



//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
?>