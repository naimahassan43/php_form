<?php include('header.php');?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <h3 class="mb-3">User Registration Form</h3>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" name="fname" class="form-control" id="fname" autocomplete="off" required="required">
          </div>
          <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control" id="lname" autocomplete="off" required="required">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="uname" class="form-label">User Name</label>
            <input type="text" name="uname" class="form-control" id="uname" autocomplete="off" required="required">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="register" value="Register Member">
          </div>
        </form>
        <?php
            if(isset($_POST['register'])){
             
              $fname    = $_POST['fname'];
              $lname    = $_POST['lname'];
              $email    = $_POST['email'];
              $uname    = $_POST['uname'];
              $password = $_POST['password'];

              $hassedpass = sha1($password);


              //Insert data into database

              $sql = "INSERT INTO users(`fname`, `lname`, `email`, `uname`, `password`, `joindate`) VALUES ('$fname','$lname','$email','$uname','$hassedpass',now())";
              
              $register= mysqli_query($db,$sql);

              if('register'){
                header('Location: allUsers.php');
              }
              else{
                die("Mysql connection error" . mysqli_error($db));
              }
            }
        ?>
      </div>
    </div>
  </div>

</section>
<?php include('footer.php');?>