

<?php

define('DB_NAME', "PpU8ewRXYU");
define('DB_USER', "PpU8ewRXYU");
define('DB_PASS', "UJW4uY9sUm");
define('DB_SERV', "remotemysql.com");

try {

    $conn = new PDO("mysql:host=".DB_SERV.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); 

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}


if(isset($_POST['btn']) ){

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $birthday = $_POST['birthday'];


        $add =  " INSERT INTO p5_database (first_name, last_name, phone_number, email, birthday )
         VALUES ('$first_name','$last_name', '$phone_number','$email','$birthday') ";
         $conn->query($add);
         header("location: index.php");
}





if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM p5_database WHERE  id=$id");

header("location: index.php?delete=$id");


}




















?>

