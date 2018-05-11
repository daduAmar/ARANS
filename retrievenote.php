<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

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
       require "connect.php";
       $sql="SELECT path FROM note";
       $result=mysqli_query($link, $sql);
       $rows = mysqli_fetch_all($result);
      // print_r($rows); 
       
       if ($result === false) {
               
                exit("Couldn't execute the query." . mysqli_error($link));
       }
       foreach($rows as $row){
         echo '<div class="img-box">';
           echo '<img src="'.$row[0].'" width="200" alt="' .  pathinfo($row[0], PATHINFO_FILENAME) .'">';
             echo '<p><a href="download.php?file=' . urlencode($row[0]) . '">Download</a></p>';
        echo '</div>';
    }
//      if(isset($_REQUEST["file"])){
//       // Get parameters
//       $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
//       $filepath = "uploads/" . $file;
      
//       // Process download
//       if(file_exists($filepath)) {
//           header('Content-Description: File Transfer');
//           header('Content-Type: application/octet-stream');
//           header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
//           header('Expires: 0');
//           header('Cache-Control: must-revalidate');
//           header('Pragma: public');
//           header('Content-Length: ' . filesize($filepath));
//           flush(); // Flush system output buffer
//           readfile($filepath);
//           exit;
//       }
// }
   
 ?>

  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>