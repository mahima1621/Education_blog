<?php
include('security.php');
include('includes/header.php');
include('includes/menu.php');
?>
<?php
$con=mysqli_connect("localhost","root","","admin_panel");
  
    if(isset($_POST['department_edit_btn']))
    {
        $id=$_POST['edit_id'];

        $query="SELECT * FROM department_category WHERE id='$id'";
        $query_run=mysqli_query($con,$query);

        foreach($query_run as $row)
        {
    ?>
<div class="container-fluid"><br/>
<h6 class="m-0 font-weight-bold text-primary"> Department edit</h6><br/>
<div class="card shadow mb-4">
       
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            
        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="edit_name"  class="form-control" placeholder="Enter your name" value="<?php echo $row['name']?>">
                </label>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="edit_description"  class="form-control" placeholder="Enter your description" value="<?php echo $row['description']?>">
                </label>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="department_image" id="department_image" class="form-control" placeholder="Enter your image" value="<?php echo $row['image']?>">
                </label>
            </div>
            <div class="form-group" >
                <select name="userupdate" class="form-control" value="usertype">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <a href="department.php" name="department_edit" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="department_update" class="btn btn-primary">UPDATE</button>
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