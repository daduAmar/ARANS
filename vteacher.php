<?php 
  require_once 'connect.php';


  if (empty($_SESSION['a_uname'])) {
    header("Location: trialhome.php");
  }
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>viewTeacher</title>
    <script language="javascript" type="text/javascript">
    function confirmDelete()
      {
        return confirm('Delete, Are you sure?');
      }

    </script>
  </head>
  <body>
  <br>
  
  <div class="container">
  
  <table class="table table-hover table-bordered bg-white">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">Name</th>
              <th class="text-center">Email</th>
              <th class="text-center">Username </th>
              <th class="text-center" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>

      <?php 

        $sql = "SELECT * FROM teachers WHERE status=1";

        $result = mysqli_query($link, $sql)
              or die("Error in fetching records");
        $rows = mysqli_fetch_all($result);
        
      ?>
          
          <?php  foreach ($rows as $row): ?>
            
            <tr>
              <td class="text-center"> <?php echo $row[1]; ?> </td>
              <td class="text-center"> <?php echo $row[2]; ?> </td>
              <td class="text-center"> <?php echo $row[3]; ?> </td>
              
              <td class="text-center"> <a href="tupdate.php?tid=<?php echo $row[0]; ?>">
               <button class="btn btn-info">Update</button></a></td>
              <td class="text-center"> <a href="tdelete.php?tid=<?php echo $row[0]; ?>" onclick="return confirmDelete()"> <button class="btn btn-danger">Delete</button></a></td>
            </tr>
        
        <?php endforeach; ?>

    </tbody>
  </table>
  <a href="trialadminpanel.php" class="btn btn-info btn-block float-right" role="button">BACK</a><br><br>
  </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>