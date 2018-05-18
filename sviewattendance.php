<?php 
  session_start();

  // Get this from the session
  $stdid = $_SESSION['stdid'];

  require_once "connect.php";

  $query="SELECT * FROM subject WHERE sem=(SELECT sem FROM students WHERE stdid=$stdid)";
  $result=mysqli_query($link,$query) or die(mysqli_error($link));

  if (isset($_GET['submit'])) {

    $sub_id = $_GET['sub_id'];
    $date = $_GET['date'];


    if ($sub_id == "Select Subject") {
      if (!empty($date)) {
        $sql = "SELECT subname, status, date FROM subject, attendance WHERE subject.subid=attendance.subid AND stdid=$stdid AND attendance.date='$date'";
      }
      else {
        echo "Select something!";
      }
    }
    else {

      if(!empty($date)){

        $sql="SELECT subname,status, date FROM subject, attendance
            WHERE subject.subid=attendance.subid AND stdid=$stdid AND attendance.subid=$sub_id  and attendance.date=$date";
      }
      else
      {
        $sql="SELECT subname,status, date FROM subject, attendance
            WHERE subject.subid=attendance.subid AND stdid=$stdid AND attendance.subid=$sub_id";
      }
    }

    if (isset($sql)) {
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



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/jQuery-3.3.1.min.js"></script>
    <title>Student attendance</title>
  
  </head>  
  <body>


  <form method="GET" action="sviewattendance.php">

      <label>Subject: </label>
  
    <select class="form-control" name="sub_id">

          <option>Select Subject</option>

          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            
              <option 
              <?php 
                  // for that subject chosen by the student
                  if (!empty($sub_id) and $row['subid'] == $sub_id) {
                      echo "selected=selected";
                  } 
              ?>
              value="<?php echo $row['subid']; ?>"><?php echo $row['subname'];?></option>

          <?php endwhile; ?>

      </select>
    <label>Date:</label>
    <input type="date" name="date" value="<?php echo (empty($date))? '' : $date; ?>"> 
    <br>
      <input type="submit" name="submit" value="View Attendance">
  </form>
  <br>
  <br>
  <hr>

  <?php if(isset($_GET['submit']) and !empty($students)): ?>

    <table>
      <thead>
        <tr>
          <td>Date</td>
          <td>Status</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($students as $student): ?>
          <tr>
            <td><?php echo $student['subname']; ?></td>
            <td><?php echo $student['date']; ?></td>
            <td>
              <?php 
                echo ($student['status']) ? "Present" : "Absent"; 
              ?>          
            </td> 
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  
  <?php elseif (isset($no_student) and $no_student===true): ?>
    <h2>No attendance on <?php echo $date; ?></h2>

  <?php endif; ?>

      
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>