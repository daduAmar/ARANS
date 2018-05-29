<?php 
	session_start();

	if (empty($_SESSION['username'])) {

    	header("Location: trialhome.php");
  	}


	// Get this from the session
	$tid = $_SESSION['tid'];

	require_once "connect.php";

	$query="SELECT * FROM subject WHERE tid=$tid";
	$result=mysqli_query($link,$query) or die(mysqli_error($link));

	if (isset($_GET['submit'])) {		
		   
		   $sub_id = $_GET['sub_id'];
		
		if ( $sub_id == "Select Subject")  {
				header("Location: viewattendance.php?nosub");
			}
		
		if ($_GET['sub_id'] != "Select Subject") {

			$sub_id = $_GET['sub_id'];
			$date = $_GET['date'];
		

			if ( (empty($date)) )  {
				header("Location: viewattendance.php?nodate");
			}

			$sql="SELECT name, rollno, sem, attendance.status FROM attendance, students WHERE attendance.stdid=students.stdid AND attendance.date='$date' AND attendance.subid=$sub_id";

			if ($result_att = mysqli_query($link, $sql)) {
				$students = mysqli_fetch_all($result_att, MYSQLI_ASSOC);

				if (mysqli_num_rows($result_att) === 0) {
					$no_student=true;
				}

			}
			else {
				die('Error!');
			}
		}
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Attendance</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="teacher.css">
   	<script src="js/jQuery-3.3.1.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>
	<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="tpanel.php">Back</a>
    </li>
    </ul>
  
  <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="att_cal.php"><h4><span class="badge badge-success">Calculate Attendance</span></h4></a>
      </li>
    </ul>
  </div>
</nav>
	
	
	
	<?php 
		if (isset($_GET['nodate'])) {
			echo "<h3> Please select a date! </h3>";
		}
		if (isset($_GET['nosub'])) {
			echo "<h3> Please select a subject! </h3>";
		} 
	?>

	<div class="container">
	<br>
	<form class="form-group form-inline" method="GET" action="viewattendance.php">

  	  <label>Subject: </label>
	
	  <select class="form-control mr-3 ml-1" name="sub_id">

	  			<option>Select Subject</option>

		     	<?php while ($row = mysqli_fetch_assoc($result)): ?>
		      	
		      		<option value="<?php echo $row['subid']; ?>"> <?php echo $row['subname'];?></option>

		      	<?php endwhile; ?>

      </select>
	  <label>Date:</label>
	  <input type="date" class="form-control ml-2" name="date">	
	  	
      
      <input type="submit" class="btn btn-primary  ml-2" name="submit" value="View Attendance">

	</form>
	</div>

	<?php if(isset($_GET['submit']) and $_GET['sub_id'] != "Select Subject" and empty($no_student)): ?>
		<div class="container">
		<table class="table table-secondary table-hover table-bordered">
			<thead>
				<tr>
					<td>Name</td>
					<td>Roll No</td>
					<td>Sem</td>
					<td>Status</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $student): ?>
					<tr>
						<td><?php echo $student['name']; ?></td>
						<td><?php echo $student['rollno']; ?></td>
						<td><?php echo $student['sem']; ?></td>
						<td>
							<?php 
								echo ($student['status']) ? "Present" : "Absent"; 
							?>					
						</td>	
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	<?php elseif (isset($no_student) and $no_student=true): ?>
		<h2>No attendance on <?php echo $date; ?></h2>

	<?php endif; ?>
	<br>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <div class="footer bg-dark fixed-bottom">
     	 ARANS <br>
     	 &copy; Copyright 2018 Designed by Amar & Dipsikha
	</div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

