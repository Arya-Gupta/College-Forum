<!doctype html>
<html lang="en">

<head>
    <title>College Forum</title>
    <?php include 'partials/_header.php' ?>
</head>

<body>
    <?php include 'partials/_dbconnect.php' ?>    
    <?php
    $id=$_GET['thread_id'];
    $sql="SELECT * FROM threads WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($result))
    {
        $topic=$row['thread_title'];
        $desc=$row['thread_desc'];
        $created=$row['thread_created'];
        $thread_uid=$row['thread_uid'];
    }
    ?>

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        //insert comment into database
        $com_desc=$_POST['comment'];
        $uid=$_SESSION['user_id'];
        $sql="INSERT INTO `comments` (`com_desc`, `thread_id`, `com_uid`, `com_created`) VALUES ('$com_desc', '$id', '$uid', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
            echo 'We are facing some difficulties. Please try again later.';
        }
    }
    ?>

    <?php
    $sql="SELECT user_name FROM `users` WHERE uid=$thread_uid";
    $res=mysqli_query($conn,$sql);
    $name=mysqli_fetch_assoc($res)['user_name'];  
    ?>

    <!-- Start of thread topic -->
    <main class="container my-5">
        <div class="bg-light p-5 rounded">
            <h1><?php echo $topic; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <p><?php echo $name ?> &nbsp; <?php echo $created; ?></p>
        </div>
    </main>
    <!-- End of thread topic -->

    <!-- Start of write a comment -->
    <?php
    if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin']==true)
    {
        if(isset($_SESSION['user_identity']) && $_SESSION['user_identity']=="teacher")
        {
            if($_GET['no']!=2)
            {
                echo '
                <form class="container my-5" action="'. $_SERVER["REQUEST_URI"] .'" method="post">
                    <div class="mb-3">
                        <h4><label for="exampleFormControlTextarea1" class="form-label">Write a detailed comment:</label></h4>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="comm_uid" value="'. $_SESSION['user_id'] .'">
                    <button type="submit" class="btn btn-success">Comment</button>
                </form>
                ';
            }
        }
        else if(isset($_SESSION['user_identity']) && $_SESSION['user_identity']=="student")
        {
            if($_GET['no']==2)
            {
                echo '
                <form class="container my-5" action="'. $_SERVER["REQUEST_URI"] .'" method="post">
                    <div class="mb-3">
                        <h4><label for="exampleFormControlTextarea1" class="form-label">Write a detailed comment:</label></h4>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="comm_uid" value="'. $_SESSION['user_id'] .'">
                    <button type="submit" class="btn btn-success">Comment</button>
                </form>
                ';
            }
        }
    }
    ?>
    <!-- End of write a comment -->
    <!-- Start of discussion -->
    <div class="container">
        <h2>Browse Discussions</h2>
        <div class="my-5">
            <?php
            $isEmpty=true;
            $id=$_GET['thread_id'];
            $sql="SELECT * FROM comments WHERE thread_id=$id";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                $comment_uid=$row['com_uid'];
                $sql="SELECT * FROM `users` WHERE uid=$comment_uid";
                $res=mysqli_query($conn,$sql);
                $name=mysqli_fetch_assoc($res)['user_name'];

                

                $isEmpty=false;
                echo '
                <div class="container border-bottom" style="padding: 10px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="resources/user-img.jpg" style="width: 60px; display: block;" alt="user image">
                            <div style="font-size: 12px;">
                                <div>'. $name .'</div>
                                <div>'. $row['com_created'] .'</div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="mx-3">'. $row['com_desc'] .'</div>
                        </div>
                    </div>
                </div>
                ';
            }
            if($isEmpty)
            {
                echo '<div style="font-size: 22px;">Be the first to post a comment</div>';
            }
            ?>
        </div>
    </div>
    <!-- End of discussion -->

    <?php include 'partials/_footer.php' ?>
</body>

</html>