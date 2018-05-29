<!DOCTYPE html>
<html>
<head>
        <title>Home page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="trialhome.css">
  

</head>
<body>

<!-- fixed bg image -->

   <br><br><br><br>
<div class="container">
    
  <div class="jumbotron jumbotron-fluid text-body text-left mb-0 mt-0">
      <div class="container">
        <h1 class="display-3">
          <div class="text-muted"> ARANS</h1> 
          <div class="text-muted"><p>Attendance Records & Assignments Notifying System</p></div>
          </div> 
          </div>
  <!-- </div> -->


  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="teacherregister.php
      ">Teacher registration</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Login
      </a>
      <div class="dropdown-menu">
        <button type="button" class="btn btn-md dropdown-item" data-toggle="modal" data-target="#myModal">
        Teacher</button>
        <button type="button" class="btn btn-md dropdown-item" data-toggle="modal" data-target="#myLogin">Student</button>
      </div>
    </li>
  </ul>

  <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="adminlogin.php">Admin Login</a>
      </li>
    </ul>
  </div>
</nav>

  

<div class="mid">
    <?php if (isset($_GET['msg'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3 mt-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            
            <?php   
          
                echo "Invalid Login! Try again..."
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    </div>
  <?php endif; ?> 

  <?php if (isset($_GET['al1'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3 mt-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            
            <?php   
          
                echo "Account is not activated!"
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    </div>
  <?php endif; ?>       
  <?php if (isset($_GET['al2'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3 mt-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            
            <?php   
          
                echo "You're rejected!"
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    </div>
  <?php endif; ?>       
  <?php if (isset($_GET['emp'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3 mt-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            
            <?php   
          
                echo "Please, fill in all the inputs!";
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    </div>
  <?php endif; ?>         


  <?php if (isset($_GET['err'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3 mt-1">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            
            <?php   
          
                echo "Invalid Login!";
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    </div>
  <?php endif; ?>
  <?php if (isset($_GET['succ'])): ?>
    <div class="row">
    <div class="col-md-6 offset-md-3 mt-1">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            
            <?php   
          
                echo "New Teacher added successfully!";
            ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
    </div>
  <?php endif; ?>  


    <div class="container">
      <div class="row">
       
           

           <!--carousel  -->
  <div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="images/imagee1.jpg" alt="First slide">
              </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="images/imagge2.jpg" alt="Second slide">
            </div>
           <div class="carousel-item">
              <img class="d-block w-100" src="images/image3.png" alt="Third slide">
           </div>
           <div class="carousel-item">
             <img class="d-block w-100" src="images/image4.jpeg" alt="Fourth slide">
           </div>
        </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
           </a>
           <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
          </a>
  </div>

  <div class="my-class col-md-4 text-center">
    <br>
   <h4 class="text-muted"><b> Notice Board </b></h4><br>
   <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">
    >>COMMENCEMENT OF 3RD & 5TH SEMESTER CLASSES... 
    <a href="#">View More!!!</a><span class="badge badge-danger">New</span></a>
    <br><br>
    <a href="#"> >>CLICK HERE </a> FOR ONLINE ADMISSION  FORM <br><br>
    <a href="#"> >>TIME-TABLE: NEW SESSION  <span class="badge badge-danger">New</span><br><br></a>
    <a href="#"> >>ADMISSION AGAINST VACANT SEAT OF THE SESSION 2017-2018 <span class="badge badge-danger">New</span> <br><br></a>
    >>CLASSES CANCELLED DUE TO MEETING! <a href="#">Click here!!!</a> <br>
   
  
  </marquee>
  </div>

   </div>
  </div>
    <!-- </div> -->

        <div class="col-md-12">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist" >
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">About Us</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Contact Us</a>
              </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">ARANS: Attendance Records & Assignments Notifying System is a computerized system which provides schools and higher education in many ways. There is no doubt that an attendance record system will help save time and money by eliminating a great deal of manual processes.  Attendance records can be kept which acts like the backup of the original attendance recorded manually. Moreover, students can get updated in case he/she is absent in the class on a particular day, by simply signing up the system. Our system also notifies of assignments given by the teachers when the student sign in. </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Interested in using this system? Good news! You can also get a free trial session before buying it. For further information contact us immediately! Email id- 
             <a href="#">amarjyoti@gmail.com </a> | <a href="#"> dipsikhaphukan09@gmail.com </a><br> Amarjyoti Gautam<img class="img" src="images/conamar.jpg" alt="Avatar" > Dipsikha Phukan<img class="img" src="images/condip.jpg">
              </div>
            </div>
        </div>
    


     
     
     <!--teacherMODAL  --> 

  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-dark">Teacher Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        

      <div class="modal-body">
    
        <form method="POST" action="tlogin.php">
          
          <div class="form-group">
            <label>Username/Email address</label>
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username/email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="psd" class="form-control" required="required" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary" id="btn1" name="submit">Login</button>
          <button type="reset" class="btn btn-primary">Reset</button>
      
        </form>
      </div>
        
      <div class="modal-footer bg-info">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>

    <!--studentMODAL  -->
<div id="myLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-dark">Student Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        

      <div class="modal-body">
    
        <form method="POST" action="studentlogin.php">
          
          <div class="form-group">
            <label>Username/Email address</label>
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="uname" class="form-control" required="required" placeholder="Enter username/email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="psd" class="form-control" required="required" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Login</button>
          <button type="reset" class="btn btn-primary">Reset</button>
      
        </form>
      </div>
        
      <div class="modal-footer bg-info">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

 

 <!-- Footer -->

<div class="footer bg-dark">
      ARANS <br>
      &copy; Copyright 2018 Designed by Amar & Dipsikha
</div>
</div>
<br><br><br><br>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    $('.carousel').carousel({
      interval:3000,
      keyboard: true,
      pause:'hover',
      wrap:true
    });
   </script>
   <!-- <script>
     $(document).ready(function(){
        $('#btn1').on('click',function(){
          alert('Logged In');
        });
     });
   </script> -->
</body>
</html>