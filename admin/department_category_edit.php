<?php
include('security.php');
include('includes/header.php');
include('includes/menu.php');
?>


  
<div class="container-fluid"><br/>
<h6 class="m-0 font-weight-bold text-primary"> Faculty edit</h6><br/>
<div class="card shadow mb-4">
    <div class="card-body">
        <?php
        if(isset($_POST['department_category_editbtn']))
        {
            $id=$_POST['edit_id'];

            $con=mysqli_connect("localhost","root","","admin_panel");
            $query="SELECT * FROM department_category_list WHERE id='$id'";
            $query_run=mysqli_query($con,$query);
    
            foreach($query_run as $row_editing)
            {

        }
   ?>
    <form action="code.php" method="POST" enctype="multipart/form-data">
    
    <input type="hidden" name="updateing_id" value="<?php echo $row_editing['id']?>">
            
    <?php
        $department="SELECT * FROM department_category";
        $dept_run=mysqli_query($con,$department);

        if(mysqli_num_rows($dept_run)>0)
        {
          ?>
            <div class="form-group">
            <label>Department Category ID/Name</label>
            <select name="department_category_id" id="" class="form-control" required>
              <option value="">Choose your department category</option>
              <?php
                   foreach($dept_run as $row)
                   {
              ?>
              <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                    <?php
                   }
                    ?>
            </select>
            </div>
        <?php
        }
        else
        {
          echo "No data available";
        }
     
        ?>

            <div class="form-group">
            <label >Department List Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row_editing['name'] ?>" placeholder="enter name" required>
            </div>
            <div class="form-group">
            <label >Description</label>
            <input type="text" name="description" class="form-control" value="<?php echo $row_editing['description'] ?>" placeholder="enter description" required>
            </div>
            <div class="form-group">
            <label >Section</label>
            <input type="text" name="section" class="form-control" value="<?php echo $row_editing['section'] ?>" placeholder="enter section" required>
            </div>
        
            <a href="department_list.php" name="department" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="department_list_update" class="btn btn-primary">UPDATE</button>
        </div>
        </div>
    </form>
    </div>
</div>
</div>

        <?php
        }
        
        ?>


<?php
include('includes/script.php');

?>