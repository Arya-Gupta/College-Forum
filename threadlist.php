<!doctype html>
<html lang="en">

<head>
    <title>College Forum</title>
    <?php include 'partials/_header.php' ?>
</head>

<body>
    <?php include 'partials/_dbconnect.php' ?>
    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM categories WHERE cat_id=$id";
    $result=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($result))
    {
        $topic=$row['cat_name'];
        $desc=$row['cat_desc'];
    }
    ?>

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        //insert question into database
        $q_title=$_POST['q_title'];
        $q_desc=$_POST['q_desc'];
        $uid=$_SESSION['user_id'];
        if(isset($_POST['q_noti']))
        {
            $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_noti`, `thread_catid`, `thread_uid`, `thread_created`) VALUES ('$q_title', '$q_desc', 'on', '$id', '$uid', current_timestamp())";
        }
        else
        {
            $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_noti`, `thread_catid`, `thread_uid`, `thread_created`) VALUES ('$q_title', '$q_desc', 'off', '$id', '$uid', current_timestamp())";
        }
        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
            echo 'We are facing some difficulties. Please try again later.';
        }
    }
    ?>

    <!-- Start of thread topic -->
    <main class="container my-5">
        <div class="bg-light p-5 rounded">
            <h1><?php echo $topic; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <p>Forum rules and regulations are requested to be maintained.</p>
            <a class="btn btn-lg btn-success" href="/docs/5.1/components/navbar/" role="button">Post a
                question&raquo;</a>
        </div>
    </main>
    <!-- End of thread topic -->

    <!-- Start of threads -->
    <div style="padding: 50px;">
        <?php
        $sql="SELECT * FROM threads WHERE thread_catid=$id";
        $result=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_assoc($result))
        {
            $thread_uid=$row['thread_uid'];
            $sql="SELECT user_name FROM users WHERE uid=$thread_uid";
            $res=mysqli_query($conn,$sql);
            $name=mysqli_fetch_assoc($res)['user_name'];
            echo '
            <div class="container border-bottom" style="padding: 10px;">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="resources/user-img.jpg" style="width: 60px; display: block;" alt="user image">
                        <div style="font-size: 12px;">
                            <div>'. $name .'</div>
                            <div>'. $row['thread_created'] .'</div>
                        </div>
                    </div>
                    <div class="container">
                        <a class="text-dark" style="font-size: 20px; display: inline-block; text-decoration: none;" href="thread.php?thread_id='. $row['thread_id'] .'&no='. $id .'"><div class="flex-grow-1 ms-3"><strong>'. $row['thread_title'] .'</strong></div></a>
                        <div class="mx-3">'. $row['thread_desc'] .'</div>
                    </div>
                </div>
            </div>
            ';
        }
        ?>
    </div>
    <!-- End of threads -->

    <!-- Start of post a question -->
    <?php
    //if user is logged in
    if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin']==true)
    {
        if(isset($_SESSION['user_identity']) && $_SESSION['user_identity']=="teacher")
        {
            if($id==3)
            {
                echo '
                    <form class="container my-5" action="'. $_SERVER["REQUEST_URI"] .'" method="post">
                        <div class="mb-3">
                            <h4><label for="exampleInputEmail1" class="form-label">Title</label></h4>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="q_title">
                        </div>
                        <div class="mb-3">
                            <h4><label for="exampleFormControlTextarea1" class="form-label">Elaborate your concern</label></h4>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="q_desc"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="q_noti">
                            <label class="form-check-label" for="exampleCheck1">Send me a notification in case someone replies to my thread</label>
                        </div>
                        <button type="submit" class="btn btn-success">Post</button>
                    </form>
                ';
            }
            else
            {
                echo '<h4 class="container my-3">Teachers are not allowed to create posts here.</h4>';
            }
        }
        else if(isset($_SESSION['user_identity']) && $_SESSION['user_identity']=="student")
        {
            if($id==3)
            {
                echo '<h4 class="container my-3">Students are not allowed to create posts here.</h4>';
            }
            else
            {
                echo '
                <form class="container my-5" action="'. $_SERVER["REQUEST_URI"] .'" method="post">
                    <div class="mb-3">
                        <h4><label for="exampleInputEmail1" class="form-label">Title</label></h4>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="q_title">
                    </div>
                    <div class="mb-3">
                        <h4><label for="exampleFormControlTextarea1" class="form-label">Elaborate your concern</label></h4>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="q_desc"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="q_noti">
                        <label class="form-check-label" for="exampleCheck1">Send me a notification in case someone replies to my thread</label>
                    </div>
                    <button type="submit" class="btn btn-success">Post</button>
                </form>
                ';
            }
        }
    }
    //if user isn't logged in 
    else
    {
        echo '<h4 class="container my-3">Want to post a question? Please login to continue.</h4>';
    }
    ?>
    <!-- End of post a question -->

    <?php include 'partials/_footer.php' ?>
</body>

</html>











