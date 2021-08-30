<?php
include('security.php');
include('includes/header.php');
include('includes/menu.php');
?>
<?php
$con=mysqli_connect("localhost","root","","admin_panel");
  
    if(isset($_POST['faculty_edit_btn']))
    {
        $id=$_POST['edit_id'];

        $query="SELECT * FROM faculty WHERE id='$id'";
        $query_run=mysqli_query($con,$query);

        foreach($query_run as $row)
        {
    ?>
<div class="container-fluid"><br/>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Faculty edit</h6><br/>
        </div>
        <div class="card-body">
  
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="edit_name"  class="form-control" placeholder="Enter your name" value="<?php echo $row['name']?>">
                </label>
            </div>
            <div class="form-group">
                <label>Designation</label>
                <input type="text" name="edit_designation"  class="form-control" placeholder="Enter your designation" value="<?php echo $row['designation']?>">
                </label>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="edit_description"  class="form-control" placeholder="Enter your description" value="<?php echo $row['description']?>">
                </label>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="faculty_image" id="faculty_image" class="form-control" placeholder="Enter your image" value="<?php echo $row['image']?>">
                </label>
            </div>
            <div class="form-group" >
                <select name="userupdate" class="form-control" value="usertype">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <a href="faculty.php" name="faculty_edit" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="faculty_update" class="btn btn-primary">UPDATE</button>
        </div>
        </div>
    </form>
</div>
</div>

        <?php
        }
        }
        ?>
       
<?php
include('includes/script.php');
include('includes/footer.php');
?>