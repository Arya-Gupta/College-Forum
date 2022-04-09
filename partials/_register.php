<?php 

if($_SERVER['REQUEST_METHOD']=='POST')
{
    include '_dbconnect.php';
    $identity=$_POST['identity'];
    if(isset($identity) && $identity=="student") //if the person registering is a student
    {
        $student_name=$_POST['student_name'];
        $student_email=$_POST['student_email'];
        $student_batch=$_POST['student_batch'];
        $student_stream=$_POST['student_stream'];
        $student_password=$_POST['student_pw'];
        $student_confirm_password=$_POST['student_cpw'];
        
        //check if email id is already in use
        $sql="SELECT * FROM `users` WHERE user_email='$student_email'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
            $showError="Email id is already in use by another account";

        //check if password equals confirm password
        else
        {
            if($student_password!=$student_confirm_password)
                $showError="Passwords do not match";
            else
            {
                //insert into database
                $student_password_hash=password_hash($student_password, PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`user_name`, `user_email`, `user_batch`, `user_stream`, `user_identity` , `user_pw`, `created`) VALUES ('$student_name', '$student_email', '$student_batch', '$student_stream', '$identity' , '$student_password_hash', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $showAlert=true;
                    header("Location: /college-forum/index.php?signup=true");
                }
                else
                {
                    $showError="We are currently facing some issues. Please try again later.";
                }
            }
        }
        //if there is any error
        if($showError)
            header("Location: /college-forum/index.php?signup=false&error=$showError");
    }
    else if(isset($identity) && $identity=="teacher") //if the person registering is a teacher
    {
        $teacher_name=$_POST['teacher_name'];
        $teacher_email=$_POST['teacher_email'];
        $teacher_password=$_POST['teacher_pw'];
        $teacher_confirm_password=$_POST['teacher_cpw'];

        //check if email id is already in use
        $sql="SELECT * FROM `users` WHERE user_email='$teacher_email'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
            $showError="Email id is already in use by another account";

        //check if password equals confirm password
        else
        {
            if($teacher_password!=$teacher_confirm_password)
                $showError="Passwords do not match";
            else
            {
                //insert into database
                $teacher_password_hash=password_hash($teacher_password, PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`user_name`, `user_email`, `user_identity`, `user_pw`, `created`) VALUES ('$teacher_name', '$teacher_email', '$identity' , '$teacher_password_hash', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                if($result)
                {
                    $showAlert=true;
                    header("Location: /college-forum/index.php?signup=true");
                }
                else
                {
                    $showError="We are currently facing some issues. Please try again later.";
                }
            }
        }
        //if there is any error
        if($showError)
            header("Location: /college-forum/index.php?signup=false&error=$showError");
    }
}
    
?>
