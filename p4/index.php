<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <header >
        <div class="container">
            <div class="header-top">
                <h1>Xcasts</h1>
                <a href="#">Sign in</a>
            </div>

<nav>

                <a href="?page=less_than_50_years&id=1" id="1">UNDER 50 YEARS</a>
                <a href="?page=under_zero_salary&id=2"  id="2">UNDER 0 SALARY</a>
                <a href="?page=more_than_200_years&id=3" id="3" >200+ YEARS</a>
                <a href="?page=from_100_to_150_years&id=4" id="4">100-150 YEARS</a>





            </nav>
        </div>
    </header>

<script>
    var get = "<?php echo $_GET['id']; ?>";
    var id = document.getElementById(get);
    id.style.color = "black";


</script>

<?php

$page = isset($_GET['page']) ? $_GET['page'] : false;
$employees = json_decode(file_get_contents("http://dummy.restapiexample.com/api/v1/employees?fbclid=IwAR1IuL34aOax7gGhWxlWH6wWqy6abFgk3bVOCvhcvk5TJaaeSkFwKv5GGM8"), true);

switch($page){
    case 'less_than_50_years': 
    foreach($employees as $each){
        if($each['employee_age'] < 50){
            echo "<div class='content'>".$each['employee_name']." is ".$each['employee_age']." years old and has salary ".$each['employee_salary']."$</div>";
        }
    }
    break;
case 'under_zero_salary': 
    foreach($employees as $each){
        if($each['employee_salary'] < 0){
            echo "<div class='content'>".$each['employee_name']." is ".$each['employee_age']." years old and has salary ".$each['employee_salary']."$</div>";
        }
    }
    break;

    case 'more_than_200_years': 
    foreach($employees as $each){
        if($each['employee_age'] > 200){
            echo "<div class='content'>".$each['employee_name']." is ".$each['employee_age']." years old and has salary ".$each['employee_salary']."$</div>";
        }
    }
    break;

    case 'from_100_to_150_years': 
    foreach($employees as $each){
        if($each['employee_age'] >= 100 && $each['employee_age'] <= 150){
            echo "<div class='content'>".$each['employee_name']." is ".$each['employee_age']." years old and has salary ".$each['employee_salary']."$</div>";
        }
    }
    break;

    default:
        echo "<h1> Select filter in order to view desirable results </h1>";





    }


    ?>


</body>
</html>
