<!DOCTYPE html>
<html>
     <head>
     	<title>D4NT3</title>
     	<script src="https://code.jquery-2.1.3.min.js"></script>
     	<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrz5t41ssLdxGhVrurbmBWopoE1 +M6BdEfwnCJZtKxi1kgxUyJq13dy" crossorigin="anonymous">
     	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHD1i+4"crossorigin="anonymous"></script>

     </head> 
     <body>
     	<?php
     	$mysqli = new mysqli('remotemysql.com', 'PpU8ewRXYU','UJW4uY9sUm', 'PpU8ewRXYU') or die(mysqli_error($mysqli));
          $table = 'p3_database';
?>
</body>

<?php
$result = $mysqli->query("SELECT * FROM $table") or die($mysqli->error);

while ($data = $result->fetch_assoc()){
	echo "<h2>{$data['name']}</h2>";
	echo "<img src='{$data['img_dir']}' width='40%' height='40%'>";

}

?>

</html>