<?php
		session_start();
		$tid=$_SESSION['tid'];
		require_once "connect.php";
		
		if(isset($_POST['submit']))
		{
			$file=$_FILES['file'];

			$fileName=$_FILES['file']['name'];
			$fileTmpName=$_FILES['file']['tmp_name'];
			$fileSize=$_FILES['file']['size'];
			$fileError=$_FILES['file']['error'];
			
			$fileExt=explode('.', $fileName);
			$fileActualExt=strtolower(end($fileExt));

			$allowed=array('jpg','jpeg','png','pdf','docx','pptx');

			if(in_array($fileActualExt, $allowed))
			{
				if($fileError===0)
				{
					if($fileSize<100000000000)
					{
						$fileNameNew=uniqid('',true).".".$fileActualExt;
						$fileDestination= 'uploads/'.$fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);
						
						$id=$_POST['sub_id'];
						
						$sql="INSERT INTO note(subid,path,date) values ($id,'$fileDestination', NOW())";
						mysqli_query($link,$sql) or die(mysqli_error($link));

						header("Location: spanel.php?Uploadedsuccessfully!");
				    } 
					else
					{
					echo "Your file size is too big! ";
				    }
				}
				else
				{
					echo "There was an error uploading the file!";		
				}

			}
			else 
			{
				echo "You cannot upload files of this type!";
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
   <link rel="stylesheet" href="teacher.css">
    <title>Uploads</title>
  </head>
  <body>
  	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <!-- Brand -->
	  <a class="navbar-brand" href="trialhome.php">Home</a>
	</nav> 

  	<?php 
  			require_once "connect.php";
  
    		$query="SELECT * FROM subject WHERE tid=$tid";
    		
    		$result=mysqli_query($link,$query) or die(mysqli_error($link));

  	?>




	<div class="row">
  	<div class="col-md-6 offset-md-3">
    <br>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

      <div class="form-group">
      	  <label>Subject: </label>
		
		  <select class="form-control" name="sub_id">

		  			<option>Select Subject</option>

			     	<?php while ($row = mysqli_fetch_assoc($result)): ?>
			      	
			      		<option value="<?php echo $row['subid'] ?>"> <?php echo $row['subname'] ?> </option>

			      	<?php endwhile; ?>

	      </select>
      </div>
      
      <div class="form-group">
        	<input type="file" name="file" class="">
      </div>
      
      <button type="submit" class="btn btn-primary" name="submit">Upload</button>
      <button type="reset" class="btn btn-primary ">Reset</button>
	
	</form>
   	</div>
   	</div>
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