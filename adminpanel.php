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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title> Admin | Approve Teacher </title>
  </head>
  <body>
    
    <div class="container">
      
      <h1 class="text-center" style="margin: 20px;"> Admin Approve Teacher </h1>


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

        <table class="table table-hover table-bordered">
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
              <td class="text-center"> <a href="adminpanel.php?action=apv&tid=<?php echo $row[0]; ?>">
               <button>Approve</button></a></td>
              <td class="text-center"> <a href="adminpanel.php?action=dapv&tid=<?php echo $row[0]; ?>"> <button>Dis-approve</button></a></td>
            </tr>


            <?php endforeach; ?>

          </tbody>
        </table>

      <?php endif; ?>  
    

    </div>


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <a href="index.php">HOME</a>
  </body>
</html>