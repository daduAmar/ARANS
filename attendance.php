<?php 
	session_start();

	// Get this from the session
	$tid = $_SESSION['tid'];

	date_default_timezone_set("Asia/Kolkata");
	$dat = date("Y-m-d");

	require_once "connect.php";

	$query="SELECT * FROM subject WHERE tid=$tid";
	$result_subject=mysqli_query($link,$query) or die(mysqli_error($link));

	if (isset($_GET['submit'])) {

		$subid = $_GET['sub_id'];

		$id_name = explode("-", $subid);

		$_SESSION['sub_id'] = $id_name[0];

		$sql = "SELECT * FROM students WHERE sem=(SELECT sem FROM subject WHERE subid=$id_name[0]) and students.stdid not in (SELECT stdid FROM attendance WHERE date='$dat' and subid=$id_name[0])";

		if ($result_std = mysqli_query($link, $sql)) {
			$students = mysqli_fetch_all($result_std, MYSQLI_ASSOC);
			
			$std_list = array();

			foreach ($students as $student) {
				$std_list["$student[stdid]"] = 0;
			}

			$_SESSION['std_list'] = $std_list;
		}
	}

	elseif (isset($_POST['submit'])) {

		if (isset($_POST['cstd_list'])) {

			foreach ($_POST['cstd_list'] as $c_stdid) {
				if (array_key_exists ($c_stdid , $_SESSION['std_list'])) {
					 $_SESSION['std_list'][$c_stdid] = 1;
				}
			}
		}


		$sql = "INSERT INTO attendance(tid, stdid, subid, status, date)VALUES (?, ?, ?, ?, ?)";
		 
		if($stmt = mysqli_prepare($link, $sql)){
		    // Bind variables to the prepared statement as parameters
		    mysqli_stmt_bind_param($stmt, "iiiis", $tid, $key, $_SESSION['sub_id'], $value, $dat);

		    foreach ($_SESSION['std_list'] as $key => $value) {
		    	mysqli_stmt_execute($stmt); 
		    }
		    
		} 
		else{
		    echo "DB Error: " . mysqli_error($link);
		}
	}
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Attendance</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/jQuery-3.3.1.min.js"></script>
 </head>
 <body>
 	  
	<form method="GET" action="attendance.php">

  	  <label>Subject: </label>
	
	  <select class="form-control" name="sub_id">

	  			<option>Select Subject</option>

		     	<?php while ($row = mysqli_fetch_assoc($result_subject)): ?>
		      	
		      		<option value="<?php echo $row['subid'].'-'.$row['subname']; ?>"> <?php echo $row['subname'];?></option>

		      	<?php endwhile; ?>

      </select>
	  <br>
      <input type="submit" name="submit" value="View Students">
	</form>
	<br>
	<br>

	<?php if(isset($_GET['submit'])): ?>
		
		<?php if(!empty($students)): ?>

			<h2> Students taking <?php echo $id_name[1]; ?> </h2>

			<form method="POST" action="attendance.php">

				<?php 
					foreach ($students as $student) {
						echo $student['name'] . "&nbsp; &nbsp; &nbsp;";
						echo $student['rollno'] . "&nbsp; &nbsp; &nbsp;";
						echo $student['sem'] . "&nbsp; &nbsp; &nbsp;";
					
						echo "<input type='checkbox' name='cstd_list[]' value='$student[stdid]'>";
						echo "<br>";
					}
				?>
				
				<input type="submit" name="submit" value="Done">
			</form>
	
		<?php else: ?>
			
			<?php 
				if ( isset($id_name[1]) ) {
					echo "<h2> Attendance already recorded for ".$id_name[1]. "</h2>";  
				}
			?>

		<?php endif; ?>


	<?php endif; ?>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
 </body>
 </html>