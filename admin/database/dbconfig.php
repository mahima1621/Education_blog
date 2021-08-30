    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<?php
$server_name="localhost";
$user_name="root";
$password="";
$db_name="admin_panel";
$con=mysqli_connect($server_name,$user_name,$password);
$dbconfig=mysqli_select_db($con,$db_name);
if($dbconfig){
    //echo "connection sucessful";
}else{
    echo '<div class="container">

    <!-- 404 Error Text -->
    <div class="rows">
    <div class="col-md-8 mr-auto ml-auto pt-5 text-center"> 
    <div class="card">
        <div class="card-body">
            <h1 class="data-error text-danger">Database connection failed</h1>
            <p class="lead mb-5">Page Not Found</p>
            <p class="text-gray mb-1">Please check your database connection</p>
            <a href="#" class="btn btn-primary">:)</a>
        </div>
    </div>
    </div>
    </div>
</div>';
}


?>