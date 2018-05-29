<?php 
  require_once 'connect.php';


  if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $tid = $_GET['tid'];

    if ($action == 'apv') {
      $sql = "UPDATE teachers SET status=1 WHERE tid=$tid";
      $message = "Teacher's been approved";
    }
    elseif ($action == 'dapv') {
      $sql = "UPDATE teachers SET status=0 WHERE tid=$tid";
      $message = "Teacher's been rejected"; 
    }


    if(mysqli_query($link, $sql)) {
      $is_ok = true;
    }
    else {
      $is_ok = false;
    }
  }


  $sql = "SELECT tid, name FROM teachers WHERE status IS NULL";

  if ($result = mysqli_query($link, $sql)) {
    $rows = mysqli_fetch_all($result);
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
    <link rel="stylesheet" href="teacher.css">
    
    <title> Admin | Approve Teacher </title>
  </head>
  <body>

    
    <div class="container">
    
      <div class="text-center">
      <div class="display-4 bg-info pt-0">Approve | Disapprove Teacher</div>
      </div>
      <br>
      <?php if (isset($message) and isset($is_ok) and $is_ok === true): ?>

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            
            <?php 
                echo "<strong> $message </strong>"
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        
      <?php endif; ?>


      <?php if(!empty($rows)): ?>
        
        <table class="table table-hover table-bordered bg-white">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">Teacher's Name</th>
              <th class="text-center" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>

            <?php  foreach ($rows as $row): ?>
            
            <tr>
              <td class="text-center"> <?php echo $row[1]; ?> </td>
              <td class="text-center"> <a href="approveteacher.php?action=apv&tid=<?php echo $row[0]; ?>">
               <button class="btn btn-success">Approve</button></a></td>
              <td class="text-center"> <a href="approveteacher.php?action=dapv&tid=<?php echo $row[0]; ?>"> <button class="btn btn-danger">Dis-approve</button></a></td>
            </tr>


            <?php endforeach; ?>

          </tbody>
        </table>
        
      <?php endif; ?>  
      <a href="trialadminpanel.php" class="btn btn-info btn-block float-right" role="button">BACK</a><br><br>
      <br><br>

    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>