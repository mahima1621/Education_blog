<?php
include('security.php');
include('includes/header.php');
include('includes/menu.php');
?>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="aboutusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="code.php" method="POST">
      <div class="modal-body">
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="enter title">
            </div>
            <div class="form-group">
            <label >Subtitle</label>
            <input type="text" name="subtitle" class="form-control" placeholder="enter subtitle">
            </div>
            <div class="form-group">
            <label >Description</label>
            <textarea type="text" name="description" class="form-control" placeholder="enter description"></textarea>
            </div>
            <div class="form-group">
            <label >Links</label>
            <input type="text" name="links" class="form-control" placeholder="enter links">
            </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="about_save" class="btn btn-primary">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!--modal end-->

<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">About us
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aboutusModal">ADD</button>
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
              echo '<h3 class="bg-primary text-white">'.$_SESSION['status'].'</h3>';
              unset($_SESSION['status']);
            }
            ?>
                <div class="table-responsive">
                   <?php
                   $con=mysqli_connect("localhost","root","","admin_panel");
                   $query="SELECT * from aboutus";
                   $query_run=mysqli_query($con,$query);
                   ?>
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Description</th>
                            <th>Links</th>
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
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['subtitle']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['links']?></td>
                        <td>
                            <form action="aboutus_edit.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                            <button class="btn btn-success" type="submit" name="edit_btn" >EDIT</button>
                            </form>
                      </td>
                      <td>
                            <form action="code.php" method="POST">
                            <input type="hidden" name="deleteid" value="<?php echo $row['id']?>">
                            <button class="btn btn-danger" type="submit" name="deletebtn">DELETE</button>
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
