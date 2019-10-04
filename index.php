<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width" charset="utf-8">
    <title>Timer</title> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
 
<body>
<div id="nofity">
  <?php 
  if( !empty( $_REQUEST['message'] ) )
  {
     echo 'Insertado correctamente!';
  }
  ?>
</div>
 <div id="main">
 <p style="font-size:80px;margin-bottom:30px">Timer</p>
<div id="timer">
  <span id="hours">00:</span>
  <span id="mins">00:</span>
  <span id="seconds">00</span>  
</div>
<div class="wrap">
<form method="post" action="register.php" enctype="multipart/form-data"> 
  <label id="taskName">Task name: </label>  <input type="text" name="task" required />
    <input type="hidden" name="day" />
    <input type="hidden" name="time" />
    <div class="btns">
    <button type="button" id="startStop" class="custom-button green basic">Start</button>
    <button type="button" id="reset" class="custom-button blue basic"> Reset</button>
    <button type="submit" id="finish" class="custom-button orange basic">Finish</button>
    </div>
    </form> 
    </div>
<form method="post" action="results.php" enctype="multipart/form-data">
<input type="hidden" name="dayResults" /> 
<button type="submit" id="result" class="custom-button lila basic">Today's Summary</button>
</form>
<!-- <input type="submit" value="Today's Summary" 
    onclick="window.location='http://localhost:8080/TimeTracker/results.php';" />        -->
 </div>
</body>    

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script src="js/time_tracker.js"></script>

</html>
