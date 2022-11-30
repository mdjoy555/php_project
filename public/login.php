<?php
    include_once($_SERVER["DOCUMENT_ROOT"])."/php_project/config.php";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./img/logoAndFavicon/small-logo.png" type="image/x-icon">
        <title>Login</title>
        <link rel="stylesheet" href="./font/font.css">

        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Offline Font Awesome  -->
        <!-- <link rel="stylesheet" href="./css/all.min.css"> -->


        <!-- Slick Slider  -->
        <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->

        <!-- Offline Slick Slider  -->
        <link rel="stylesheet" href="./css/slick.css">


        <link rel="stylesheet" href="./css/owl.carousel.min.css">


        <!-- Animation  -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css"> -->
        <link rel="stylesheet" href="./css/animate.css">

        <!-- Bootstrap CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

        <!-- Offline Bootstrap CSS -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">

        <!-- Main CSS  -->
        <link rel="stylesheet" href="./css/main.css">

    </head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <?php
                    if($_SESSION['message']!=""):
                    ?>
                        <div class="alert alert-warning">
                            <?php
                                echo $_SESSION['message'];
                                $_SESSION['message'] = "";
                            ?>
                        </div>
                    <?php
                    endif;
                ?>
                <h4 class="mt-5 text-center">Login</h4>
                <form class="mt-3" method="post" action="<?= $webroot;?>admin/users/login.php"
                enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail" name="email" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword" name="password" value="">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>