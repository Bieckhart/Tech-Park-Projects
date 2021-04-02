<?php  
 include 'crud.php';  
 $object = new Crud();  
 if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "Load")  
      {  
           echo $object->get_data_in_table("SELECT * FROM p6_database ORDER BY id DESC");  
      }  
      if($_POST["action"] == "Insert")  
      {  
           $first_name = mysqli_real_escape_string($object->connect, $_POST["first_name"]);  
           $last_name = mysqli_real_escape_string($object->connect, $_POST["last_name"]);  
           $image = $object->upload_file($_FILES["user_image"]);  
           $query = "  
           INSERT INTO p6_database

           (first_name, last_name, image)   
           VALUES ('".$first_name."', '".$last_name."', '".$image."')";  
           $object->execute_query($query);  
           echo 'Data Inserted';       
      }  
      if($_POST["action"] == "Fetch Single Data")  
      {  
           $output = '';  
           $query = "SELECT * FROM p6_database
           WHERE id = '".$_POST["user_id"]."'";  
           $result = $object->execute_query($query);  
           while($row = mysqli_fetch_array($result))  
           {  
                $output["first_name"] = $row['first_name'];  
                $output["last_name"] = $row['last_name'];  
                $output["image"] = '<img src="upload/'.$row['image'].'" class="img-thumbnail" width="50" height="35" />';  
                $output["user_image"] = $row['image'];  
           }  
           echo json_encode($output);  
      }  
      if($_POST["action"] == "Edit")  
      {  
           $image = '';  
           if($_FILES["user_image"]["name"] != '')  
           {  
                $image = $object->upload_file($_FILES["user_image"]);  
           }  
           else  
           {  
                $image = $_POST["hidden_user_image"];  
           }  
           $first_name = mysqli_real_escape_string($object->connect, $_POST["first_name"]);  
           $last_name = mysqli_real_escape_string($object->connect, $_POST["last_name"]);  
           $query = "UPDATE p6_database
           SET first_name = '".$first_name."', last_name = '".$last_name."', image = '".$image."' WHERE id = '".$_POST["user_id"]."'";  
           $object->execute_query($query);  
           echo 'Data Updated';  
      }  
 }  
 ?>  