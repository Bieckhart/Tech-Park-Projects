<?php
define('DB_NAME', "PpU8ewRXYU");
define('DB_USER', "PpU8ewRXYU");
define('DB_PASS', "UJW4uY9sUm");
define('DB_SERV', "remotemysql.com");

$conn = new PDO("mysql:host=".DB_SERV.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

$sql = "SELECT * FROM p5_database";
$query = $conn->query($sql);
$result = $query->fetchAll();

$bToday = [];
$bInFewDays = [];

foreach($result as $each){
    $bd = $each['birthday'];
    $crop_bd = substr($bd, 2);//00-08-25 
    $bd_format = date_parse_from_format("y-m-d",$crop_bd);//$bd_format['year'] = "00" $bd_format['month'] = "08"   $bd_format['day'] = "25"

    $currentTime = date("y-m-d"); //2019-08-24
    $currentTimeFormated = date_parse_from_format("y-m-d",$currentTime); 
//$bd_format['year'] = "19" $bd_format['month'] = "08"   $bd_format['day'] = "24"



     $diff = $bd_format['day'] - $currentTimeFormated['day'];
     if($diff <= 3 && $diff >= 0 && $bd_format['month'] == $currentTimeFormated['month']){
         if($diff == 0){


             array_push($bToday, $each['id']);
             /* bInFewDays-ში შედის ყველა ის წევრი რომლის დაბადების დღეცაა (birthday today) */ 

         }else{
             $valForFd = $each['id']."/".$diff;
             /* bInFewDays-ში შედის ყველა ის წევრი რომლის დაბადების დღეც რამდენიმე დღეშია(birthday in few days) */
            array_push($bInFewDays, $valForFd);// 3/2   3  2
        }
     }

} // foreach

foreach($bToday as $idThatHasBTodat){
    $sql = "SELECT * FROM p5_database WHERE id = '$idThatHasBTodat';";
    $query = $conn->query($sql);
    $result = $query->fetchAll();
    echo "Its ".$result[0]['first_name']."-is birthday<br>";
    
}

foreach($bInFewDays as $idThatHasBInFewDays){
    $split = preg_split('@/@',$idThatHasBInFewDays, NULL, PREG_SPLIT_NO_EMPTY);
    $id = $split[0];
    $daysTillBirthday = $split[1];
    $sql = "SELECT * FROM p5_database WHERE id = '$id';";
    $query = $conn->query($sql);
    $result = $query->fetchAll();
   
    echo "Its ".$result[0]['first_name']."-s birthday in ".$daysTillBirthday." days<br>";
    
    
   

}