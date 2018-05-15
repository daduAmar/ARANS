<?php 
	session_start();

	// Get this from the session
	$tid = $_SESSION['tid'];

	require_once "connect.php";

	$query="SELECT * FROM subject WHERE tid=$tid";
	$result=mysqli_query($link,$query) or die(mysqli_error($link));

	if (isset($_GET['submit'])) {		
		if ($_GET['sub_id'] != "Select Subject") {

			$sub_id = $_GET['sub_id'];
			$date = $_GET['date'];


			if (empty($date)) {
				header("Location: viewattendance.php?nodate");
			}

			$sql="SELECT name, rollno, sem, status FROM attendance, students WHERE attendance.stdid=students.stdid AND attendance.date='$date' and attendance.subid=$sub_id";

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
	<title></title>
</head>
<body>
	
	<?php 
		if (isset($_GET['nodate'])) {
			echo "<h3> Select a date </h3>";
		} 
	?>


	<form method="GET" action="viewattendance.php">

  	  <label>Subject: </label>
	
	  <select class="form-control" name="sub_id">

	  			<option>Select Subject</option>

		     	<?php while ($row = mysqli_fetch_assoc($result)): ?>
		      	
		      		<option value="<?php echo $row['subid']; ?>"> <?php echo $row['subname'];?></option>

		      	<?php endwhile; ?>

      </select>
	  <label>Date:</label>
	  <input type="date" name="date">	
	  <br>
      <input type="submit" name="submit" value="View Attendance">
	</form>
	<br>
	<br>
	<hr>

	<?php if(isset($_GET['submit']) and $_GET['sub_id'] != "Select Subject" and empty($no_student)): ?>

		<table>
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
	
	<?php elseif (isset($no_student) and $no_student=true): ?>
		<h2>No attendance on <?php echo $date; ?></h2>

	<?php endif; ?>

</body>
</html>

