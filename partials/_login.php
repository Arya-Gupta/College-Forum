<?php 
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include '_dbconnect.php';
    $login_email=$_POST['login_email'];
    $login_password=$_POST['login_pw'];
    // check if email exists in db
    $sql="SELECT * FROM `users` WHERE user_email='$login_email'";
    $result=mysqli_query($conn,$sql);
    $num_of_rows=mysqli_num_rows($result);
    // if email exists, check if password is correct
    if($num_of_rows==1)
    {
        $row=mysqli_fetch_assoc($result);
        $identity=$row['user_identity'];
        $name=$row['user_name'];
        $uid=$row['uid'];
        if(password_verify($login_password,$row['user_pw']))
        {
            session_start();
            $_SESSION['user_loggedin']=true;
            $_SESSION['user_email']=$login_email;
            $_SESSION['user_name']=$name;
            $_SESSION['user_id']=$uid;
            $_SESSION['user_identity']=$identity;
            header("Location: /college-forum/index.php");
        }
        else
        {
            $showError="Incorrect password!";
        }
    }
    else
    {
        $showError="User doesn't exist";
    }
    if($showError)
        header("Location: /college-forum/index.php?login=false&error=$showError");
}    
?>
