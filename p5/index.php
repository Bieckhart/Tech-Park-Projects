


<?php


define('DB_NAME', "PpU8ewRXYU");
define('DB_USER', "PpU8ewRXYU");
define('DB_PASS', "UJW4uY9sUm");
define('DB_SERV', "remotemysql.com");

 $conn = new PDO("mysql:host=".DB_SERV.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); 

$query = "SELECT * FROM  p5_database ";

$result  = $conn->query($query);


$result = $result->fetchAll();





?>


<div class="container">

  <table  style="margin-top:10px" class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>first_name</th>
        <th>lastn_name</th>
        <th>phone_number</th>
        <th>email</th>
        <th>birthday</th>
      </tr>
      

    </thead>

    <tbody>

    <?php
    foreach ($result as $friends) {
    
   
      ?>


      <tr>
        <td><?php echo $friends['id'];?></td>
         <td><?php echo $friends['first_name'];?></td>
          <td><?php echo $friends['last_name'];?></td>
           <td><?php echo $friends['phone_number'];?></td>
            <td><?php echo $friends['email'];?></td>
            <td><?php echo $friends['birthday'];?></td>
                <td>
                 
                  <a href="process.php?delete=<?php  echo $friends['id'];?>">
                    <img style="width: 25px; cursor: pointer;" src="icons/delete.png">
                  </a>

                  
                </td>
    
      </tr>



   <?php

    }

    ?>

  </tbody>

      
  </table>
</div>









<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <style>
  form{

  	margin:auto;

  }
  	

  </style>
</head>
<body>



<div class="container">
  
  <form  style="width:600px" action="process.php" method="post"> 
  	<h2>ADD FRIENDS</h2>

    <div class="form-group">
    	<label for="">first_name:</label>
       <input type="text"  class="form-control" name="first_name">
    </div>
    
    <div class="form-group">
      <label for="">last_name:</label>
      <input type="text"  class="form-control" name="last_name">
    </div>

    <div class="form-group">
      <label for="">phone_number:</label>
       <input type="text" class="form-control" name="phone_number">
    </div>

    <div class="form-group">
      <label for="">email</label>
      <input type="text"class="form-control" name="email">
      
    </div>

    <div class="form-group">
      <label for="">birtday:</label>
       <input type="date"class="form-control" name="birthday">
    </div>

    <input type="submit"  name="btn" value="submit" class="btn btn-default">
      
  </form>
  <a href="birthday.php"><button type="submit">Who has birthday</button></a>
</div>











	
</body>
</html>
