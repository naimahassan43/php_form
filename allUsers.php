<?php include('header.php');?>
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
            <!-- Read data from database -->
            <?php 
              
              $sql = "SELECT * FROM users";
              $allUsers = mysqli_query($db,$sql);

              $i=0;
              while($row = mysqli_fetch_assoc($allUsers)){
                $id       = $row['id'];
                $fname    = $row['fname'];
                $lname    = $row['lname'];
                $uname    = $row['uname'];
                $email    = $row['email'];
                $joindate = $row['joindate'];	
                $i++;
                ?>
            <tr>
              <th scope="row"><?php echo $i;?></th>
              <td><?php echo $fname;?></td>
              <td><?php echo $lname;?></td>
              <td><?php echo $uname;?></td>
              <td><?php echo $email;?></td>

              <td><?php echo $joindate;?></td>
              <td>
                <div class="btn-group">
                  <a href="updateUsers.php?update=<?php echo $id;?>" class="btn btn-success btn-sm">Update</a>
                  <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#deleteUser<?php echo $id; ?>">Delete</a>
                </div>
              </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="deleteUser<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content ">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this user?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center">
                    <div class="btn-group">
                      <a href="allUsers.php?delete=<?php echo $id;?>" class="btn btn-danger">Yes</a>
                      <a type="button" class="btn btn-success" data-bs-dismiss="modal">No</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <?php
                  }
              
              ?>


          </tbody>
        </table>

        <?php
             if(isset($_GET['delete'])) {
               $delId = $_GET['delete'];
               
               $sql = "DELETE FROM `users` WHERE id ='$delId' ";
               $deleteTheUser = mysqli_query($db,$sql);

               if($deleteTheUser){
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