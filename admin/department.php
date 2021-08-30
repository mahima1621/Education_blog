<?php
include('security.php');
include('includes/header.php');
include('includes/menu.php');
?>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="code.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
            <div class="form-group">
            <label>Dept name</label>
            <input type="text" name="name" class="form-control" placeholder="enter name">
            </div>
            <div class="form-group">
            <label >Description</label>
            <textarea type="text" name="description" class="form-control" placeholder="enter description"></textarea>
            </div>
            <div class="form-group">
            <label >image</label>
            <input type="file" id="department_image" name="department_image" class="form-control" placeholder="enter image">
            </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="dept_save" name="dept_save" class="btn btn-primary">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!--modal end-->

<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Academics -Department (Category)
                <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#departmentModal">ADD</button>
                </h6>
            </div>

            <div class="card-body">
              <?php
            if(isset($_SESSION['success']) && $_SESSION['success']!='')
            {
             echo '<h3 class="bg-primary text-white">'.$_SESSION['success'].'</h3>';
            unset($_SESSION['success']);
            }
            if(isset($_SESSION['status']) && $_SESSION['status']!='')
            {
              echo '<h3 class="bg-danger text-white">'.$_SESSION['status'].'</h3>';
              unset($_SESSION['status']);
            }
            ?>

                <div class="table-responsive">
                <?php
                   $con=mysqli_connect("localhost","root","","admin_panel");
                   $query="SELECT * from department_category";
                   $query_run=mysqli_query($con,$query);
                   ?>
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Department Name</th>
                            <th>Description</th>
                            <th>Dept image</th>
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
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo '<img src="upload/department/'.$row['image'].'" width="100px;"height="100px;" alt="">'?></td>
                        <td>
                            <form action="department_edit.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                            <button class="btn btn-success" type="submit" name="department_edit_btn" >EDIT</button>
                            </form>
                      </td>
                      <td>
                            <form action="code.php" method="POST">
                            <input type="hidden" name="deleteid" value="<?php echo $row['id']?>">
                            <button class="btn btn-danger" type="submit" name="department_delete_btn">DELETE</button>
                            </form>
                        </td>
                        </tr>  
                        <?php
                      }
                    }else{
                        echo "No record";
                    }
                      ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>
