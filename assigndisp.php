


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/jQuery-3.3.1.min.js"></script>
   <title> Assignment Display </title>
  </head>  
  <body>
  <br>
  <?php 
       require_once "connect.php";
  
        $query="SELECT * FROM subject";
        $result=mysqli_query($link,$query) or die(mysqli_error($link));
    
  ?>
  <div class="container">
  <form action="assigndisp.php" class="form-inline" method="POST">
    
    <div class="form-group">
        <label class="ml-3">Search </label>
        <input type="date" name="date" class="form-control ml-1">
    </div>
    <br>
    <select class="form-control ml-1" name="sub_id">
            
        <option>Select Subject</option>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              
                <option value="<?php echo $row['subid'] ?>"> <?php echo $row['subname'] ?> </option>

             <?php endwhile; ?>

    </select>
    
    <button type="submit" class="btn btn-primary form-inline ml-4" name="filter">Filter</button>
  </form>
  </div>
  <br>


  <div class="container">
  <table class="table table-hover table-bordered bg-white text-muted">
        <thead class="thead-dark">
          <tr>
            
              <th class="text-center">Subject</th>
              <th class="text-center">Assignment</th>
              <th class="text-center">Date</th>
          </tr>
          </thead>

          <tbody>

          <?php 

            require_once 'connect.php';
            
            if (isset($_POST['filter'])) 
            {
  
             $subid = $_POST['sub_id'];
             $date = $_POST['date'];

             if ($subid === "Select Subject") {
                $subid="";
             }

             if (!empty($subid) and !empty($date)) {
                 $sql = "SELECT subject.subname, assignment.content, assignment.date FROM assignment, subject WHERE assignment.subid = subject.subid and assignment.date='$date' and subject.subid='$subid'";
             }
             elseif (!empty($subid) and empty($date)) {
               $sql = "SELECT subject.subname, assignment.content, assignment.date FROM assignment, subject WHERE assignment.subid = subject.subid and subject.subid='$subid'"; 
             }
             elseif (empty($subid) and !empty($date)) {
                $sql = "SELECT subject.subname, assignment.content, assignment.date FROM assignment, subject WHERE assignment.subid = subject.subid and assignment.date='$date'";
             }

              
              $result = mysqli_query($link, $sql)
                  or die("Error in fetching records");

              $rows = mysqli_fetch_all($result);
          }
          else
          {
            
              $sql = "SELECT subject.subname, assignment.content, assignment.date FROM assignment, subject WHERE assignment.subid = subject.subid";



              $result = mysqli_query($link, $sql)
                    or die("Error in fetching records");

              $rows = mysqli_fetch_all($result);
             
              if ($result === false) {
                     exit("Couldn't execute the query." . mysqli_error($conn));
              }
           } 
          ?>

          <?php  foreach ($rows as $row): ?>
                
                <tr>
                  <td class="text-center"> <?php echo $row[0]; ?> </td>
                  <td class="text-center"> <?php echo $row[1]; ?> </td>
                  <td class="text-center"> <?php echo $row[2]; ?> </td>
                </tr>
            
          <?php endforeach; ?>

      </tbody>
    </table> 
    </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>