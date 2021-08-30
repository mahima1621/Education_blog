<?php
include('security.php');
include('includes/header.php');
include('includes/menu.php');
?>
<?php
$conn=mysqli_connect("localhost","root","","admin_panel");
  
    if(isset($_POST['edit_btn']))
    {
        $id=$_POST['edit_id'];

        $query="SELECT * FROM register WHERE id='$id'";
        $query_run=mysqli_query($conn,$query);

        foreach($query_run as $row)
        {
    ?>
    <div class="container-fluid"><br/>
        <h6 class="m-0 font-weight-bold text-primary">Edit Admin profile</h6><br/>
        <div class="card shadow mb-4">
            <form action="code.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            <div class="card-body">
                <div class="form-group">
                    <label>username</label>
                    <input type="text" name="edit_username" class="form-control" placeholder="Enter your name" value="<?php echo $row['username']?>">
                    </label>
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="text" name="edit_email"  class="form-control" placeholder="Enter your email" value="<?php echo $row['email']?>">
                    </label>
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="text" name="edit_password"  class="form-control" placeholder="Enter your password" value="<?php echo $row['password']?>">
                    </label>
                </div>
                <div class="form-group" >
                    <select name="userupdate" class="form-control" value="usertype">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <a href="register.php" class="btn btn-danger">CANCEL</a>
                <button type="submit" name="updatebtn" class="btn btn-primary">UPDATE</button>
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