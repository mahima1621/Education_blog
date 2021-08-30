<?php 
include('includes/header.php');
include('includes/navbar.php');

?>
<h1>Academics</h1>
<?php
$branch=$_GET['branches'];
$branch_string=str_replace("-"," ",$branch);
$con=mysqli_connect("localhost","root","","admin_panel");
$academic_page="SELECT department_category.name,department_category_list.section,department_category_list.name AS department_list_name,department_category_list.description AS department_list_description  
 FROM department_category
INNER JOIN department_category_list ON department_category.id=department_category_list.department_id 
WHERE department_category.name='$branch_string'";

$academic_page_run=mysqli_query($con,$academic_page);
if(mysqli_num_rows($academic_page_run) > 0)
{
    ?>
    <table class="table table-bordered">
    <thead>
    <tr>
    <th>Department Name</th>
    <th>List</th>
    <th>Description</th>
    <th>Section</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while($ada=mysqli_fetch_array($academic_page_run))
    {
        ?>
        <tr>
    <!--<td><?php echo $ada['id']?></td>-->
        <td><?php echo $ada['department_list_name']?></td>
        <td><?php echo $ada['department_list_description']?></td>
        <td><?php echo $ada['section']?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    </table>
<?php
    }else{
        echo "No department available";

    }
   ?>

<?php include('includes/footer.php');?>
