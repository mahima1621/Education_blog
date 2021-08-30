<?php include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container py-5">
    <div class="col-md-12 " ><br>
    <h1 class="text-center">Academics</h1>
  </div>
    <div class="row mt-4">

        <?php
        require 'admin/database/dbconfig.php';
        $query="SELECT * FROM department_category";
        $query_run=mysqli_query($con,$query);
       $check_department=mysqli_num_rows($query_run)>0;

        if( $check_department)
        {
            while($row=mysqli_fetch_array($query_run))
            {
                ?>
    <div class="col-md-3 mt-3">
           <div class="card h-100">
           <img src="admin/upload/department/<?php echo $row['image'];?>" width="260px;"height="200px;"  class="card-img-top" alt="department_img">
                <div class="card-body">
               
                <h3 class="card-title"><td><?php echo $row['name'];?></td></h3>
                <p class="card-text"><td><?php echo $row['description'];?></td></p>
                <button class="btn btn-success">View details</button>    
            </div>
             </div>
            </div>
                <?php

            }
        }
        else{
            echo "no record found";
        }
        ?>
       
           
<?php
                 
include('includes/script.php');
include('includes/footer.php');?>
