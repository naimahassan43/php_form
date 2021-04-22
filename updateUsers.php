<?php include('header.php');?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <h3 class="mb-3">Update User Information</h3>

        <?php 
            if(isset($_GET['update'])){
              $the_user = $_GET['update'];

              $sql = "SELECT * FROM users WHERE id = '$the_user' ";
              
              $userInfo = mysqli_query($db, $sql);
              
              while($row= mysqli_fetch_assoc($userInfo)){
                $id       = $row['id'];
                $fname    = $row['fname'];
                $lname    = $row['lname'];
                $email    = $row['email'];
                $uname    = $row['uname'];
                ?>
        <form action="" method="POST">
          <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $fname;?>">
          </div>
          <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $lname;?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>">
          </div>
          <div class="mb-3">
            <label for="uname" class="form-label">User Name</label>
            <input type="text" name="uname" class="form-control" id="uname" value="<?php echo $uname;?>">
          </div>
          <div class="mb-3">
            <input type="hidden" name="uId" value="<?php echo $id;?>">
            <input type="submit" class="btn btn-primary" name="update" value="Save Changes">
          </div>
        </form>
        <?php   }
              }
            
            ?>

        <?php
            //Update the user information
            if(isset($_POST['update'])){
              
              $userId   = $_POST['uId'];
              $fname    = $_POST['fname'];
              $lname    = $_POST['lname'];
              $email    = $_POST['email'];
              $uname    = $_POST['uname'];

              $sql ="UPDATE users SET fname='$fname', lname='$lname', email='$email', uname='$uname' WHERE id='$userId' ";
              $updateUserInfo = mysqli_query($db,$sql);
              
              if($updateUserInfo){
                header("Location: allUsers.php");
              }
              else{
                die("Mysql Connection Error" . mysqli_error($db));
              }
            }
          
          ?>




      </div>
    </div>
  </div>

</section>
<?php include('footer.php');?>