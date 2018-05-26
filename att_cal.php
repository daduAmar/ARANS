<?php 
	session_start();
	require_once "connect.php";
	
	$tid=$_SESSION['tid'];

	// To get the subjects thought by a teacher
	$query="SELECT * FROM subject WHERE tid=$tid";
	$result=mysqli_query($link,$query) or die(mysqli_error($link));

	if (isset($_GET['submit']) and $_GET['sub_id'] !== "---Select Subject---") {
		$sub_id = $_GET['sub_id'];

		// The two dates can't be empty
		$fdate = $_GET['fdate'];
		$tdate = $_GET['tdate'];

		//Get no of classes between two date
		$sql = "SELECT count(DISTINCT subid) FROM attendance WHERE subid=$sub_id AND date BETWEEN '$fdate' AND '$tdate' GROUP BY date";

		$result_class=mysqli_query($link, $sql) or die(mysqli_error($link));

		

		if(($total_class = mysqli_num_rows($result_class)) > 0) {

			// Get all the students taking the subject
			$sql="SELECT stdid,name,rollno,sem FROM students WHERE sem=(SELECT sem FROM subject WHERE subid=$sub_id)";

			if ($result_stdid = mysqli_query($link, $sql)) {

				if (mysqli_num_rows($result_stdid) > 0) {
					$students = mysqli_fetch_all($result_stdid, MYSQLI_ASSOC);
				}
			}
		}				
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calculate Attendance</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="teacher.css">
</head>
<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		  <!-- Brand -->
		  <a class="navbar-brand" href="trialhome.php">Home</a>

		</nav>


		<div class="container">
	    <br>
		<form class="form-group form-inline" method="GET" action="att_cal.php">

	  	  <label class="ml-2">Subject: </label>
		
		  <select class="form-control ml-2" name="sub_id">

		  			<option>---Select Subject---</option>

			     	<?php while ($row = mysqli_fetch_assoc($result)): ?>
			      	
			      		<option value="<?php echo $row['subid']; ?>"> <?php echo $row['subname'];?></option>

			      	<?php endwhile; ?>

	      </select>

		  From date: <input type="date" class="form-control ml-2" name="fdate">
		  To date: <input type="date" class="form-control ml-2" name="tdate">

		  <br>
	      <input type="submit" class="btn btn-primary  ml-2" name="submit" value="Calulate">
		
		</form>
		</div>
		
		<?php if(!empty($students)): ?>
		
			
			 
			<div class="container" id="attendance">
				<h4>Attendance From <?php echo "$fdate"; ?> To <?php echo "$tdate"; ?></h4>
				<table class="table table-secondary  table-hover table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Roll</th>
							<th>Precentage</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($students as $student): ?>
							<tr>
								<td><?php echo $student['name']; ?></td>
								<td><?php echo $student['rollno']; ?></td>
								
								
								<?php 
									//no of presence
									$sql = "SELECT COUNT(*) AS no FROM attendance WHERE subid=$sub_id AND stdid=$student[stdid] AND status=1 AND date BETWEEN '$fdate' AND '$tdate'";

									$result_std=mysqli_query($link, $sql) or die(mysqli_error($link));
									$row = mysqli_fetch_assoc($result_std);
									$no_of_presents = $row['no'];

									$per = ($no_of_presents / $total_class) * 100;
								 ?>	

								<td> <?php echo round($per, 2); ?>% </td>	

							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			
			</div>
			<div class="container">
			<button class="btn btn-secondary ">Print</button>
			</div>



		<?php endif; ?>	
	


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script type="text/javascript">
            $(document).ready(function(){
                
                $("button").click(function(){

                    var data = $("#attendance").html();

                    var mywindow = window.open("", "", 'height=500,width=800');
                    
                     mywindow.document.write("<!doctype html>");
                     mywindow.document.write('<html lang="en"><head><title>Attendance Sheet</title>');
                    mywindow.document.write('<hr>');
                    mywindow.document.write("<meta charset='utf-8'>");

                    mywindow.document.write("<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>");

                     mywindow.document.write("<link rel='stylesheet' href='css/bootstrap.min.css'>");
                     mywindow.document.write('</head><body >');
                    

                     mywindow.document.write("<div class='container'>");
                     mywindow.document.write(data);
                     mywindow.document.write("</div>");

                     mywindow.document.write('</body></html>');

                    mywindow.print();
                    mywindow.close();

                });
            });    
     </script>	
	<div class="footer bg-dark fixed-bottom">
     	 ARANS <br>
     	 &copy; Copyright 2018 Designed by Amar & Dipsikha
	</div>
</body>
</html>