<?php include "db.php" ;?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Form</title>
</head>

<body>

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




  <!--  Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
  </script>

</body>

</html>