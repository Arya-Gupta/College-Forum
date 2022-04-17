<!doctype html>
<html lang="en">

<head>
    <title>College Forum</title>
    <?php include 'partials/_header.php' ?>
</head>

<body>
    <?php $query=$_GET['query']; ?>
    <!-- Start of search results -->
    <div class="container" style="min-height: 60vh;">
        <h1 class="my-5">Search results for "<em><?php echo $query ?></em>"</h1>
        <ul style="list-style-type: none;">
        <?php
        include 'partials/_dbconnect.php';
        $sql="SELECT * from `threads` where match (thread_title, thread_desc) against ('$query')";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $threadid=$row['thread_id'];
            $catid=$row['thread_catid'];

            echo '
                <li class="my-5">
                    <h3><a class="text-dark" href="/college-forum/thread.php?thread_id='. $threadid .'&no='. $catid .'">'. $title .'</a></h3>
                    <span style="font-size: 22px;">'. $desc .'</span>
                </li>
            ';
        }
        ?>
        </ul>
    </div>
    <!-- End of search results -->

    <?php include 'partials/_footer.php' ?>
</body>

</html>
