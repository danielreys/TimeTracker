<?php
require_once "db.php";
$task = $_POST['task']; //name of the task
$day = $_POST['day'];   //day for the search
$time = $_POST['time'];  // time spended in the task

$new_date = date('Y-m-d', strtotime($day));

$query = "SELECT * FROM register where name = '" . $task . "'" . " and ". "date='" . $new_date . "'";
$sth = $conn->query($query);

$register;
while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) {
  $register = $row; // appends each row to the array
}
if(isset($register['name']))
{
$d1 = $register['duration'];
$d2 = $time;
$array_time = array();
$array_time [] = $d1;
$array_time [] = $d2;
$timeSum = sumarHoras($array_time);

$stmt = $conn->prepare('UPDATE `register` SET duration = ? WHERE name= ?  and date = ?');
$stmt->bindValue(1, $timeSum);
$stmt->bindValue(2, $task);
$stmt->bindValue(3, $new_date);
$result = $stmt->execute();
}
else {
    $stmt = $conn->prepare("INSERT INTO register (name,duration,date) VALUES(:name, :duration, :date)");
    $stmt->bindValue(':name', $task);
    $stmt->bindValue(':duration', $time);
    $stmt->bindvalue(':date',$new_date);
    $result = $stmt->execute();    
}
if(!$result)
{
    echo $result->errorCode();
}
else {
    header('Location: http://localhost:8080/TimeTracker/?message={$message}');
}
?>