
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">My College Website</a>
      <!-- Left links -->
      <ul class="navbar-nav navbar-white m-auto mb-2   mb-lg-0">
        <li class="nav-item " style="padding:0% 5% ;">
          <a class="nav-link " href="index.php" >Home</a>
        </li>
        <li class="nav-item" style="padding:0% 5% ;">
          <a class="nav-link" href="abouts.php">About</a>
        </li>
        <li class="nav-item" style="padding:0% 5% ;">
          <a class="nav-link" href="faculty.php">Faculties</a>
        </li>
        <li>
        <a class="nav-link" href="department.php" >Academics
          </a>
        </li>
      </a>
    </div>
  
      <!-- Left links -->
   
      <!-- Dropdown -->

     <!-- Navbar dropdown -->
    
          <!-- Dropdown menu -->
      
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
          require 'admin/database/dbconfig.php';
          $navbar="SELECT * FROM department_category";
          $navbar_run=mysqli_query($con,$navbar);
          if(mysqli_num_rows($navbar_run)>0)
          {
            while($nav_row=mysqli_fetch_array($navbar_run))
            {
              echo 
              '<a class="dropdown-item" href=academics.php?branches='.preg_replace('#[-]+#','-',trim( $nav_row['name'])).'>
              '.$nav_row['name'].'
              </a>';
           
            }
          }
          else{
            echo "No Dept Available";
          }
          ?>
          </ul>
        </li>
</ul>



    <!-- Collapsible wrapper -->

</div>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->


