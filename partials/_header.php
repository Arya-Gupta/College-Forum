<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&family=Red+Hat+Mono:ital,wght@0,300;0,400;0,500;0,600;1,300&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link href="https://chamilo.org/wp-content/uploads/2018/09/foro_global.png" rel="icon">

<?php session_start(); ?>
<!-- Start of navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">College Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/college-forum/index.php">Home</a></li>
                <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Mailing list</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">PDFs</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">About Us</a></li> -->
            </ul>
            <form class="d-flex mx-3" method="get" action="search.php">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0 my-1">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="resources/user-img.jpg" style="width: 30px;" alt="user image"></a>
                    <ul class="dropdown-menu" style="margin-right: 100px;" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Change profile picture</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Start of user authentication -->
            <?php
            //if user is logged in, display logout button
            if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin']==true)
            {
                echo '<a href="partials/_logout.php"><button type="button" class="btn btn-outline-success mx-3">Logout</button></a>';
            }
            //if user isn't logged in, display login and register button
            else
            {
                echo '
                <button type="button" class="btn btn-outline-success mx-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button type="button" class="btn btn-outline-success mx-3" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                ';
            }
            include 'partials/_registermodal.php';
            include 'partials/_loginmodal.php';
            ?>
            <!-- End of user authentication -->
        </div>
    </div>
</nav>
<!-- End of navbar -->























