<?php

require_once 'connect.php';
  session_start();
  if (empty($_SESSION['a_uname'])) {
    header("Location: trialhome.php");
  }

if(isset($_POST['submit']))
{
	
  $sname=$_POST['sname'];
	$sem=$_POST['sem'];
	$tid=$_POST['tid'];

$sql="insert into subject(subname,sem,tid) values('$sname','$sem','$tid')";
	if(mysqli_query($link,$sql))
	{
		$added= "Subject added successfully!";
	}
	else
	{
		$fail="Empty Fields!";
	}
}

?>
 <!DOCTYPE html>
<html>
<head>
	<title>Add Subject</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="teacher.css">
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="trialhome.php">Home</a>
     <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="trialadminpanel.php">Back</a>
      </li>
    </ul>
  </div>
    </nav>  <br>
<?php if(isset($_POST['submit'])): ?>
      <div class="alert alert-warning alert-dismissible fade show container" role="alert">
          <strong>
            <?php
              echo isset($added) ? $added : "" ; 
              echo isset($fail) ? $fail : "";
        
              
            ?>
          </strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

<?php 
      require_once 'connect.php';
      $query="SELECT * FROM teachers WHERE status=1";
      $results= mysqli_query($link,$query);

   ?>

<div class="row">
  <div class="col-md-6 offset-md-3">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Subject Name: </label>
        <input type="text" name="sname" class="form-control" required="required" placeholder="Enter subject name">
      </div>
      <div class="form-group">
      <label>Semester: </label>
      <select class="form-control" name="sem">
      <option>Select Semester</option>
      <option>1st </option>
      <option>2nd</option>
      <option>3rd</option>
      <option>4th</option>
      <option>5th</option>
      <option>6th</option>
      </select>
      </div>
   
   <div class="form-group">
        <label>Teacher Name: </label>
        	
     <select class="form-control" name="tid">
     	<option>Select Teacher</option>
    <?php while($row=mysqli_fetch_assoc($results)): ?>
    	
     	<option value="<?php echo $row['tid'] ?>"> <?php echo $row['name'] ?>
     	</option>
     
	<?php endwhile; ?>
	
	</select>

  </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-primary ">Reset</button>
 	</form>
 </div>
</div>

<div class="footer bg-dark fixed-bottom">
       ARANS <br>
       &copy; Copyright 2018 Designed by Amar & Dipsikha
    </div>


 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>