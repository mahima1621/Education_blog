<?php include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container py-5">
    <div class="row py-3 ">

        <div class="col-md-8 ">
            <div class="card" >
            <img src="img/computer.jpg"  alt="...">
            <div class="card-body">
                <?php
               require 'admin/database/dbconfig.php';
               $query="SELECT * FROM aboutus";         
               $query_run=mysqli_query($con,$query);
               
               if(mysqli_num_rows($query_run)>0)
               {
                foreach($query_run as $row)
                {
                    ?>
                  
                   
                   
                  
             
                <h5 class="card-title"><?php  echo  $row['title']; ?></h5>
                <h5><?php echo  $row['subtitle'];?></h5>
                <p class="card-text"><?php echo  $row['description'];?></p>
                <a href="<?php  echo  $row['links'];?>" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" >
            <div class="card-body">
                <h5 class="card-title">Notices!</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                <?php
                }
               }
               else
               {
                   echo "no record found!";
               }
              
                ?>
            </div>
            </div>
            <hr>
            <div class="card" >
            <div class="card-body">
                <h5 class="card-title">Notices!</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
        

    </div>
</div>

<?php

include('includes/script.php');
include('includes/footer.php');?>

