<?php include "db.php" ;?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Form</title>
</head>

<body>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 table-responsive">
          <h3 class="m-3"> All Users List</h3>
          <table class=" table table-striped table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th scope="col">#Sl</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">User name</th>
                <th scope="col">Email</th>
                <th scope="col">Join Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              //Read data from database
              <?php 
              
              $sql = "SELECT * FROM users";
              $allUsers = mysqli_query($db,$sql);

              $i=0;
              while($row = mysqli_fetch_assoc($allUsers)){
                
                $fname    = $row['fname'];
                $lname    = $row['lname'];
                $email    = $row['email'];
                $uname    = $row['uname'];
                $joindate = $row['joindate'];	
                $i++;
                ?>
              <tr>
                <th scope="row"><?php echo $i;?></th>
                <td><?php echo $fname;?></td>
                <td><?php echo $lname;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $uname;?></td>
                <td><?php echo $joindate;?></td>
                <td>
                  <div class="btn-group">
                    <a href="" class="btn btn-success btn-sm">Update</a>
                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                  </div>
                </td>

              </tr>
              <?php
                  }
              
              ?>


            </tbody>
          </table>
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