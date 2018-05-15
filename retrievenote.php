<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/jQuery-3.3.1.min.js"></script>
    <title>Display</title>
    <style type="text/css">
      .img-box{
          display: inline-block;
          text-align: center;
          margin: 0 15px;
      }
   </style>

  </head>
  <body>
  <?php 
       require_once "connect.php";
  
        $query="SELECT * FROM subject";
        $result=mysqli_query($link,$query) or die(mysqli_error($link));
    
    ?>
    <br><br>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline">
      
      <br>
    
      <select class="form-control ml-3" name="sub_id">
            
            <option>Select Subject</option>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
              
                <option value="<?php echo $row['subid'] ?>"> <?php echo $row['subname'] ?> </option>

              <?php endwhile; ?>

        </select>
        <br>
          <label class="ml-3">Date: </label>
          <input type="date" name="date" id="date" class="form-control">
      <br>
      <button type="submit" class="btn btn-primary ml-3" name="submit">Get Notes</button>
      <button type="reset" class="btn btn-primary ml-3">Reset</button>
      
      
  </form>
  </div>
  </div>
  



  <?php
    if (isset($_POST['submit'])) {
         
       require_once "connect.php";
       $subid = $_POST['sub_id'];
       $date = $_POST['date'];

       if ($subid === "Select Subject") {
          $subid="";
       }

       if (!empty($subid) and !empty($date)) {
          $sql="SELECT path FROM note WHERE subid=$subid and date='$date'";
       }
       elseif (!empty($subid) and empty($date)) {
          $sql="SELECT path FROM note WHERE subid=$subid"; 
       }
       elseif (empty($subid) and !empty($date)) {
          $sql="SELECT path FROM note WHERE date='$date'";
       }

       $result=mysqli_query($link, $sql);
       
       $rows = mysqli_fetch_all($result);
       
       if ($result === false) {
               
                exit("Couldn't execute the query." . mysqli_error($link));
       }
       foreach($rows as $row){
           echo '<div class="img-box">';
             
             echo '<img src="'.$row[0].'" width="200" alt="' .  pathinfo($row[0], PATHINFO_FILENAME) .'">';
               
               echo '<p><a href="download.php?file=' . urlencode($row[0]) . '">Download</a></p>';
              echo '</div>';
          }     
    }
  ?>
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>

