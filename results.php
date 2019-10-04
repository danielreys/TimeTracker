<!DOCTYPE html>
<html lang="en">
    <?php require_once 'db.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php
    $new_date = date('Y-m-d', strtotime($_POST['dayResults']));
   
    $query = "Select * FROM register where date = '" . $new_date . "'";

    $registers = array();
$sth = $conn->query($query);
while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) {
  $registers[] = $row; // appends each row to the array
}
    ?>
<table>
     <thead>
     <tr>
     <th>Task</th>
     <th>Time</th>
     </tr>
    </thead>
    <tbody>
    <?php
    $suma = array();
   foreach($registers as $r) {
    $suma [] =  $r['duration'];
   echo '<tr>';    
   echo '<td>'. $r['name'].'</td>';
   echo '<td>'. $r['duration'].'</td>';
   echo '</tr>';
   }

   echo '<tr>';
   echo '<td> <strong>'.' TOTAL '. $_POST['dayResults'].'</strong></td>';
   echo '<td><strong>'. sumarHoras($suma) . '</strong></td>';
   echo '</tr>';
   ?>
    </tbody>
 </table>
</body>
</html>
