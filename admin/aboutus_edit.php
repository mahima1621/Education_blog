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

        $query="SELECT * FROM aboutus WHERE id='$id'";
        $query_run=mysqli_query($conn,$query);

        foreach($query_run as $row)
        {
    ?>


<div class="container-fluid"><br/>
    <h6 class="m-0 font-weight-bold text-primary"> About us page edit</h6><br/>
        <div class="card shadow mb-4">
            <form action="code.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            
            <div class="card-body">
                <div class="form-group">
                    <label>title</label>
                    <input type="text" name="edit_title" class="form-control" placeholder="Enter title" value="<?php echo $row['title']?>">
                    </label>
                </div>
                <div class="form-group">
                    <label>subtitle</label>
                    <input type="text" name="edit_subtitle"  class="form-control" placeholder="Enter your subtitle" value="<?php echo $row['subtitle']?>">
                    </label>
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" name="edit_description"  class="form-control" placeholder="Enter your description" value="<?php echo $row['description']?>">
                    </label>
                </div>
                <div class="form-group">
                    <label>links</label>
                    <input type="text" name="edit_links"  class="form-control" placeholder="Enter your links" value="<?php echo $row['links']?>">
                    </label>
                </div>
                <div class="form-group" >
                    <select name="userupdate" class="form-control" value="usertype">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <a href="aboutus.php" class="btn btn-danger">CANCEL</a>
                <button type="submit" name="update_btn" class="btn btn-primary">UPDATE</button>
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