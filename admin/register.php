<?php
include('security.php');
include('includes/header.php');
include('includes/menu.php');

?>

<div class="modal fade" id="addadminprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add admin data</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
            <div class="modal-body">
            
                <div class="form-group">
                    <label>username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your name">
                    </label>
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email"  class="form-control checking_email" placeholder="Enter your email">
                    <small class="error_email" style="color:red;"></small>    
                </label>
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password"  class="form-control" placeholder="Enter your password">
                    </label>
                </div>
                <div class="form-group">
                    <label>cpassword</label>
                    <input type="password" name="cpassword"  class="form-control" placeholder="Enter confirm password">
                    </label>
                </div>
                
            </div>
            <input type="hidden" name="usertype" value="admin">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
                <button type="submit" name="registerbtn" class="btn btn-primary">Save changes</button>
            </div>
        </form>

    </div>
  </div>
</div>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Admin Profile
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addadminprofile">
                    Add admin profile
                    </button>
                </h6>
            </div>

            <div class="card-body">
             
                <div class="table-responsive">
                    <?php
                    $conn=mysqli_connect("localhost","root","","admin_panel");
                    $query="SELECT * FROM register";
                    $query_run=mysqli_query($conn,$query);
                    ?>
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Usertype</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run)>0)
                        {
                        while($row=mysqli_fetch_assoc($query_run))
                        {
                        ?>
                        
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['password'];?></td>
                            <td><?php echo $row['usertype'];?></td>
                        <td>
                            <form action="register_edit.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                            <button class="btn btn-success" type="submit" name="edit_btn" >EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="POST">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                            <button class="btn btn-danger" type="submit" name="delete_btn">DELETE</button>
                            </form>
                        </td>
                        </tr>  
                        <?php
                        }
                    }
                    else{
                        echo "No record Found";
                    }
                    ?>
                    </tbody>
                </div>
            </div>
        </div>
    </div>

<?php
include('includes/script.php');

?>
