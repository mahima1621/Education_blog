<?php
include('security.php');



if(isset($_POST['dept_list_save']))
{

    $department_category_id=$_POST['department_category_id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $section=$_POST['section'];


    $query="INSERT INTO department_category_list(department_id,name,description,section) VALUES ('$department_category_id','$name','$description','$section')";
    $query_run=mysqli_query($con,$query);
  
    if($query_run)
    {
        $_SESSION['status']="Department category added";
        $_SESSION['status_code']="success";
        header('Location:department_list.php');
        }
        else
        {
        $_SESSION['status']="Department category not added";
        $_SESSION['status_code']="error";
        header('Location:department_list.php');
        
}
}

if(isset($_POST['edit_id']))
{
    $id=$_POST['edit_id'];  
    $query="SELECT * FROM  department_category where id='$id'";
    $query_run=mysqli_query($con,$query);
}


if(isset($_POST['department_list_update']))
{
    

    $updateing_id=$_POST['updateing_id'];
    $department_category_id=$_POST['department_category_id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $section=$_POST['section'];

    $query="UPDATE department_category_list SET department_id='$department_category_id',name='$name',description='$description',section='$section' WHERE id='$updateing_id'";
    $query_run=mysqli_query($con,$query);
    
    if($query_run)
    {
    $_SESSION['status']="Department category updated";
    $_SESSION['status_code']="success";
    header('Location:department_list.php');
    }
    else
    {
    $_SESSION['status']="Department category not updated";
    $_SESSION['status_code']="error";
    header('Location:department_list.php');
    }
}


// if(isset($_POST['department_list_update'])){
//     $department_category_id=$_POST['department_category_id'];
//     $name=$_POST['name'];
//     $description=$_POST['description'];
//    $section=$_POST['section'];
    
    
    
//     $query="UPDATE department_category_list SET title='$title',subtitle='$subtitle',description='$description',links='$links' where id='$id'";
//     $query_run=mysqli_query($con,$query);
//     if($query_run)
//     {
        
//         $_SESSION['status']="your data is updated";
//         $_SESSION['status_code']="success";
//         header('Location:aboutus.php');
//     }else{
//         $_SESSION['status']="your data is not updated";
//         $_SESSION['status_code']="error";
//         header('Location:aboutus.php');
//     }
//     }
    



if(isset($_POST['department_category_delete_btn']))
{
    $id=$_POST['deleteid'];

    $query="DELETE FROM department_category_list where id=$id";
    $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['status']="Department category list deleted sucessfully";
        $_SESSION['status_code']="success";
        header('Location:department_list.php');
    }
    else
    {
        $_SESSION['status']="Department category list not deleted";
        $_SESSION['status_code']="error";
        header('Location:department_list.php');

    }

}















if(isset($_POST['dept_save']))
{
    $name=$_POST['name'];
    $description=$_POST['description'];
    $image=$_FILES["department_image"]["name"];

$img_type=array('image/jpg','image/png','image/jpeg');
$validate_file_extension=in_array($_FILES["department_image"]["type"],$img_type);

if($validate_file_extension)
{
if(file_exists("upload/department/".$_FILES["department_image"]["name"]))
    {
        $store=$_FILES["department_image"]["name"];
        $_SESSION['status']="image already exists.'.$store.'";
        header('Location:department.php');
    }
    else
    {
        $query="INSERT INTO department_category(name,description,image) VALUES ('$name','$description','$image')";
        $query_run=mysqli_query($con,$query);
        if($query_run)
            {
            move_uploaded_file($_FILES["department_image"]["tmp_name"],"upload/department/" . $_FILES["department_image"]["name"]);
            $_SESSION['status']="Department category added";
            $_SESSION['status_code']="success";
            header('Location:department.php');
            }
            else
            {
            $_SESSION['status']="Department not added";
            $_SESSION['status_code']="error";
            header('Location:department.php');
            }
     }

    }

}


if(isset($_POST['edit_id']))
{
    $id=$_POST['edit_id'];  
    $query="SELECT * FROM  department_category where id='$id'";
    $query_run=mysqli_query($con,$query);
}

if(isset($_POST['department_update']))
{
   $edit_id=$_POST['edit_id'];
   $edit_name=$_POST['edit_name'];
    $edit_description=$_POST['edit_description'];

    $edit_department_image=$_FILES["department_image"]["name"];
    
    $department_query="SELECT * FROM department_category where id=$id";
    $department_query_run=mysqli_query($con,$query);
    foreach($department_query_run as $fa_row)
    {
         
           if($edit_department_image==NULL)
           {
               //update new image
               $image_data=$fa_row['image'];
           }
           else
           {
               // update new image remove old image 
            if($image_path="upload/department/".$fa_row['image'])
            {
                unlink($image_path);
                $image_data= $edit_department_image;
            }

           }
    }

    $query="UPDATE department_category SET name='$edit_name',description='$edit_description',image='$image_data' WHERE id='$edit_id'";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
        if($edit_department_image==NULL){
            //update new image
            $_SESSION['status']="department updated with existing image";
            $_SESSION['status_code']="success";
            header('Location:department.php');
        }
        else{
            //remove old image and add new image
            move_uploaded_file($_FILES["department_image"]["tmp_name"],"upload/department/". $_FILES["department_image"]["name"]);
            $_SESSION['status']="Department updated with existing image";
            $_SESSION['status_code']="success";
            header('Location:department.php');
        }
        }
        else
        {
        $_SESSION['status']="Department is not updated";
        $_SESSION['status_code']="error";
        header('Location:department.php');
        }
    }

if(isset($_POST['department_delete_btn']))
{
    $id=$_POST['deleteid'];

    $query="DELETE FROM department_category where id=$id";
    $query_run=mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['success']="Department deleted successfully";
        header('Location:department.php');
    }
    else
    {
        $_SESSION['status']="Department not deleted";
        header('Location:department.php');

    }

}








if(isset($_POST['faculty_save']))
{
$name=$_POST['name'];
$designation=$_POST['designation'];
$description=$_POST['description'];
$image=$_FILES["faculty_image"]["name"];

$img_type=array('image/jpg','image/png','image/jpeg');
$validate_file_extension=in_array($_FILES["faculty_image"]["type"],$img_type);

if($validate_file_extension)
{
if(file_exists("upload/".$_FILES["faculty_image"]["name"]))
    {
        $store=$_FILES["faculty_image"]["name"];
        $_SESSION['status']="image already exists.'.$store.'";
        header('Location:faculty.php');
    }
    else
    {
        $query="INSERT INTO faculty (name,designation,description,image) VALUES ('$name','$designation','$description','$image')";
        $query_run=mysqli_query($con,$query);
        if($query_run)
            {
            move_uploaded_file($_FILES["faculty_image"]["tmp_name"],"upload/" . $_FILES["faculty_image"]["name"]);
            $_SESSION['status']="Faculty added";
            $_SESSION['status_code']="success";
            header('Location:faculty.php');
            }
            else
            {
            $_SESSION['status']="Faculty not added";
            $_SESSION['status_code']="error";
            header('Location:faculty.php');
            }
     }

}
else
{
$_SESSION['status']="only jpeg,png and jpeg files are allowed";
header('Location:faculty.php');
}         
    
}

if(isset($_POST['edit_id'])){
    $id=$_POST['edit_id'];  
    $query="SELECT * FROM  faculty where id='$id'";
    $query_run=mysqli_query($con,$query);


}
        if(isset($_POST['faculty_update']))
        {
           $edit_id=$_POST['edit_id'];
           $edit_name=$_POST['edit_name'];
            $edit_designation=$_POST['edit_designation'];
            $edit_description=$_POST['edit_description'];

            $edit_faculty_image=$_FILES["faculty_image"]["name"];
            
            $faculty_query="SELECT * FROM faculty where id=$id";
            $faculty_query_run=mysqli_query($con,$query);
            foreach($faculty_query_run as $fa_row)
            {
                 
                   if($edit_faculty_image==NULL)
                   {
                       //update new image
                       $image_data=$fa_row['image'];
                   }
                   else
                   {
                       // update new image remove old image 
                    if($image_path="upload/".$fa_row['image'])
                    {
                        unlink($image_path);
                        $image_data= $edit_faculty_image;
                    }

                   }
            }

            $query="UPDATE faculty SET name='$edit_name',designation='$edit_designation',description='$edit_description',image='$image_data' WHERE id='$edit_id'";
            $query_run=mysqli_query($con,$query);
            if($query_run)
            {
                if($edit_faculty_image==NULL){
                    //update new image
                    $_SESSION['status']="Faculty updated with existing image";
                    $_SESSION['status_code']="success";
                    header('Location:faculty.php');
                }
                else{
                    //remove old image and add new image
                    move_uploaded_file($_FILES["faculty_image"]["tmp_name"],"upload/". $_FILES["faculty_image"]["name"]);
                    $_SESSION['success']="Faculty updated with existing image";
                    header('Location:faculty.php');
                }
                }
                else
                {
                $_SESSION['status']="Faculty not updated";
                $_SESSION['status_code']="error";
                header('Location:faculty.php');
                }
            }
        if(isset($_POST['faculty_delete']))
        {
            $id=$_POST['deleteid'];

            $query="DELETE FROM faculty where id=$id";
            $query_run=mysqli_query($con,$query);

            if($query_run)
            {
                $_SESSION['status']="faculty deleted sucessfully";
                $_SESSION['status_code']="success";
                header('Location:faculty.php');
            }
            else
            {
                $_SESSION['status']="faculty not deleted";
                $_SESSION['status_code']="error";
                header('Location:faculty.php');

            }
        }
          







if(isset($_POST['about_save']))
{
$title=$_POST['title'];
$subtitle=$_POST['subtitle'];
$description=$_POST['description'];
$links=$_POST['links'];

$query="INSERT INTO aboutus (title,subtitle,description,links) VALUES ('$title','$subtitle','$description','$links')";
$query_run=mysqli_query($con,$query);
if($query_run)
{
$_SESSION['status']="About us added";
$_SESSION['status_code']="success";
header('Location:aboutus.php');
}
else
{
 $_SESSION['status']="About us not added";
 $_SESSION['status_code']="error";
 header('Location:aboutus.php');
}
}

if(isset($_POST['edit_id'])){
    $id=$_POST['edit_id'];  
    $query="select * from aboutus where id='$id'";
    $query_run=mysqli_query($con,$query);

}

if(isset($_POST['update_btn'])){
$id=$_POST['edit_id'];
$title=$_POST['edit_title'];
$subtitle=$_POST['edit_subtitle'];
$description=$_POST['edit_description'];
$links=$_POST['edit_links'];



$query="UPDATE aboutus SET title='$title',subtitle='$subtitle',description='$description',links='$links' where id='$id'";
$query_run=mysqli_query($con,$query);
if($query_run)
{
    
    $_SESSION['status']="your data is updated";
    $_SESSION['status_code']="success";
    header('Location:aboutus.php');
}else{
    $_SESSION['status']="your data is not updated";
    $_SESSION['status_code']="error";
    header('Location:aboutus.php');
}
}
if(isset($_POST['deletebtn']))
{
$id=$_POST['deleteid'];
$query="DELETE from aboutus where id='$id'";
$query_run=mysqli_query($con,$query);
if($query_run)
{
$_SESSION['status']="your data is deleted";
$_SESSION['status_code']="success";
header('Location:aboutus.php');
}
else
{
$_SESSION['status']="your data is not deleted";
$_SESSION['status_code']="error";
header('Location:aboutus.php');
}
}

























if(isset($_POST['check_submit_btn']))
{
    $email=$_POST['email'];
    $email_query="SELECT * FROM register where email='$email'";
    $email_query_run=mysqli_query($con,$email_query);
    if(mysqli_num_rows($email_query_run)>0)
    {
   echo "Email already taken please try another one";
  
    }
    else
    {
        echo "its available";
    }
}



if(isset($_POST['registerbtn']))
    {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $usertype=$_POST['usertype'];

    $email_query="SELECT * FROM register where email='$email_id'";
    $email_query_run=mysqli_query($con,$email_query);
    if(mysqli_num_rows($email_query_run)>0)
    {
        $_SESSION['status']="Email already taken please try another one";
        $_SESSION['status_code']="warning";
        header('Location:register.php');
    }
    else
    {

    if($password===$cpassword)
    {
        $query="INSERT INTO register(username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
        $query_run=mysqli_query($con,$query);
        if($query_run)
        {
        $_SESSION['status']="Admin profile updated";
        $_SESSION['status_code']="success";
        header('Location:register.php');
        }
        else
        {
            $_SESSION['status']="Admin profile not updated";
            $_SESSION['status_code']="error";
            header('Location:register.php');
        }
    }
    else
    {
            $_SESSION['status']="Password and cpassword doesnt match";
            $_SESSION['status_code']="warning";
            header('Location:register.php');
        }
    }
    }
    if(isset($_POST['edit_id'])){
        $id=$_POST['edit_id'];  
        $query="select * from register where id='$id'";
        $query_run=mysqli_query($con,$query);
    
    }
if(isset($_POST['updatebtn'])){
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $usertype=$_POST['userupdate'];
    $query="UPDATE register SET username='$username',email='$email',password='$password',usertype='$usertype' where id='$id'";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
        

        $_SESSION['status']="Your data is updated";
        $_SESSION['status_code']="success";
        header('Location:register.php');
    }else{
        $_SESSION['status']="your data is not updated";
        $_SESSION['status_code']="error";
        header('Location:register.php');
    }
}
if(isset($_POST['delete_id']))
{
    $id=$_POST['delete_id'];
    $query="DELETE from register where id='$id'";
    $query_run=mysqli_query($con,$query);
    if($query_run)
    {
    $_SESSION['status']="Your data is deleted";
    $_SESSION['status_code']="success";
    header('Location:register.php');
    }
    else
    {
    $_SESSION['status']="your data is not deleted";
    $_SESSION['status_code']="error";
    header('Location:register.php');
    }
}

if(isset($_POST['login_btn']))
{
    $email_login=$_POST['email'];
    $password_login=$_POST['password'];
    $query="SELECT * FROM register where email='$email_login' AND password='$password_login'";
    $query_run=mysqli_query($con,$query);
    $usertypes=mysqli_fetch_array($query_run);

    if($usertypes['usertype']=="admin")
    {
    $_SESSION['username']=$email_login;
    header('Location:index.php');
    }
    else if($usertypes['usertype']=="user")
    {
    $_SESSION['username']=$email_login;
    header('Location:../index.php');
    }
    else
    {
    $_SESSION['status']="Email or Password is invalid";

    header('Location:login.php');
    }
}

?>