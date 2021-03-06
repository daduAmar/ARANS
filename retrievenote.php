<?php  
  session_start();
  
  if (empty($_SESSION['uname'])) {
    header("Location: trialhome.php");
  }

  $stdid=$_SESSION['stdid'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="teacher.css">
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
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>
  <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="spanel.php">Back</a>
      </li>
    </ul>
  </div>
  </nav>

  <?php 
       require_once "connect.php";
  
        $query="SELECT * FROM subject WHERE sem=(SELECT sem FROM students WHERE stdid=$stdid)";
        $result=mysqli_query($link,$query) or die(mysqli_error($link));
    
    ?>
    <br><br>
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <p class="container text-info "><b>Select either subject or date!</b></p>
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
             
             $npath=$row[0];
             $npathExt=explode('.', $npath);
             $npathActExt=end($npathExt);
             
             if ($npathActExt=='pdf') {
               echo '<img src="images/icon8.png" width="80" alt="' .  pathinfo($row[0], PATHINFO_FILENAME) .'">';
             }
             
             elseif ($npathActExt=='docx') {
               echo '<img src="images/icon4.png" width="100" alt="' .  pathinfo($row[0], PATHINFO_FILENAME) .'">';
             }
             elseif ($npathActExt=='pptx') {
               echo '<img src="images/icon6.png" width="100" alt="' .  pathinfo($row[0], PATHINFO_FILENAME) .'">';
             }
             else
             {
               echo '<img src="'.$row[0].'" width="200" alt="' .  pathinfo($row[0], PATHINFO_FILENAME) .'">';
              } 
              
               
               echo '<p><a href="download.php?file=' . urlencode($row[0]) . '">Download</a></p>';
              echo '</div>';
          }     
    }
  ?>
    
    <div class="footer bg-dark fixed-bottom">
       ARANS <br>
       &copy; Copyright 2018 Designed by Amar & Dipsikha
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>

