<!doctype html>
<html lang="en">

<head>
    <title>College Forum</title>
    <?php include 'partials/_header.php' ?>
</head>

<body>

    <!-- Start of notice carousel -->
    <div style="background-color: rgb(235, 235, 235);">
        <div id="carouselExampleIndicators" style="width: 1000px; margin: auto;" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="filter: brightness(80%)">
                <div class="carousel-item active">
                    <img src="resources/carousel-img1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="resources/carousel-img2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="resources/carousel-img3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- End of notice carousel -->

    <!-- Start of category container -->
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <?php
            include 'partials/_dbconnect.php';
            $sql = "SELECT * FROM categories";
            $result = mysqli_query($conn, $sql);
            //display cards
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="col-md-4 my-2">
                    <div class="card">
                        <img src="resources/' . $row['cat_img'] . '.jpg" class="card-img-top" alt="' . $row['cat_img'] . '">
                        <div class="card-body">
                            <h5 class="card-title"><a style="text-decoration: none; color: black;  font-size: 25px;" href="threadlist.php?catid=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a></h5>
                            <p class="card-text">' . $row['cat_desc'] . '</p>
                            <a href="threadlist.php?catid=' . $row['cat_id'] . '" class="btn btn-primary btn-success">' . $row['cat_btn'] . '</a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>
    <!-- End of category container -->
    <?php include 'partials/_footer.php' ?>
</body>

</html>