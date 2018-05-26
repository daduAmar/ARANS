<?php 
  session_start();
  $tid=$_SESSION['tid'];
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
    <title></title>
  
  </head>  
  <body>
    
    <?php 
        
        require_once "connect.php";
    
     if (isset($_GET['submit']) and $_GET['sub_id'] !== "---Select Subject---") {
        
        $sub_id = $_GET['sub_id'];
        $fdate = $_GET['fdate'];
        $tdate = $_GET['tdate'];

        //Get no of classes between two date
        $sql = "SELECT count(DISTINCT subid) FROM attendance WHERE subid=$sub_id AND date BETWEEN '$fdate' AND '$tdate' GROUP BY date";

        $result_class=mysqli_query($link, $sql) or die(mysqli_error($link));

        $total_class = mysqli_num_rows($result_class);

        
        $_SESSION['tot_cls']=$total_class;

        // Get all the students taking the subject
        $sql="SELECT stdid,name,rollno FROM students WHERE sem=(SELECT sem FROM subject WHERE subid=$sub_id)";

        if ($result_stdid = mysqli_query($link, $sql)) {

          if (mysqli_num_rows($result_stdid) > 0) {

            while ($rows = mysqli_fetch_assoc($result_stdid)) {
              $stdid = $rows['stdid'];
              $_SESSION['row']=$rows;

              $sql = "SELECT COUNT(*) AS no FROM attendance WHERE subid=$sub_id AND stdid=$stdid AND status=1 AND date BETWEEN '$fdate' AND '$tdate'";

              $result_std=mysqli_query($link, $sql) or die(mysqli_error($link));

              $row = mysqli_fetch_assoc($result_std);

              $no_of_presents = $row['no'];

              $_SESSION['nop']=$no_of_presents;
          }
        }
      }   
    }
?>
    <?php 
      require_once "connect.php";
      $query="SELECT * FROM subject WHERE tid=$tid";
      $result=mysqli_query($link,$query) or die(mysqli_error($link));

     ?>
  
    <form class="form-group form-inline" method="GET" action="attcal.php">

        <label>Subject: </label>
    
      <select class="form-control" name="sub_id">

            <option>---Select Subject---</option>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              
                <option value="<?php echo $row['subid']; ?>"> <?php echo $row['subname'];?></option>

              <?php endwhile; ?>

        </select>
      From date: <input type="date" name="fdate">
      To date: <input type="date" name="tdate">

      <br>
        <input type="submit" name="submit" value="Calulate">

    </form>
    

    <?php if(isset($_GET['submit'])): ?>
    <?php  $rows=$_SESSION['row'];?>
    <div class="container">
    <table class="table table-secondary table-hover table-bordered">
      <thead>
        <tr>
          <td>Name</td>
          <td>Roll No</td>
          <td>percent</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $row): ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['rollno']; ?></td>
            <td>
              <?php 
                $tc=$_SESSION['tot_cls'];
                $nop=$_SESSION['nop'];
      
                  if ($tc > 0 ) {
                    $per = ($nop / $tc) * 100;

                   echo "$per";
                }
              ?>          
            </td> 
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div> 
   <?php endif; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>