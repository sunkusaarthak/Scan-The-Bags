<?php

session_start();

require_once('./CreateDb.php');
require_once('./component.php');


// create instance of Createdb class
$database = new CreateDb();

if (isset($_POST['add'])) {
    $res = $database->getLink($_POST['product_id']);
    $row1 = mysqli_fetch_assoc($res);
    header("Location: " . $row1['link']);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explore</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/newbootstrap.css">
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-md sticky-top py-3" id="mainNav" style=\"position:fixed;\">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img style="width:40px;" src="assets/scanthebags.png">
                &nbsp; &nbsp;
                <span>SCAN THE BAGS</span></a><button data-bs-toggle="collapse" class="navbar-toggler"
                data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="explore.php">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="section over-hide z-bigger">
        <div class="section over-hide z-bigger">
            <div class="container pb-5">
                <div class="row justify-content-center pb-5">
                    <div class="col-12 pt-5">
                        <p class="mb-4 pb-2">Filter Tools</p>
                    </div>
                    <form action="" method="post">
                        <div class="col-12 pb-5">
                            <input class="checkbox-tools" type="radio" onclick="javascript: submit()" value="all"
                                name="tools" id="tool-0">
                            <label class="for-checkbox-tools" for="tool-0">
                                <!-- <i class='uil uil-line-alt'></i> -->
                                All
                            </label>
                            <input class="checkbox-tools" type="radio" name="tools" onclick="javascript: submit()"
                                value="laptop" id="tool-1">
                            <label class="for-checkbox-tools" for="tool-1">
                                <!-- <i class='uil uil-line-alt'></i> -->
                                Laptops
                            </label>
                            <!--
                            --><input class="checkbox-tools" type="radio" name="tools" onclick="javascript: submit()"
                                value="mobile" id="tool-2">
                            <label class="for-checkbox-tools" for="tool-2">
                                <!-- <i class='uil uil-vector-square'></i> -->
                                Mobiles
                            </label>
                            <!--
                            --><input class="checkbox-tools" type="radio" name="tools" onclick="javascript: submit()"
                                value="books" id="tool-3">
                            <label class="for-checkbox-tools" for="tool-3">
                                <!-- <i class='uil uil-ruler'></i> -->
                                Books
                            </label>
                            <!--
                            --><input class="checkbox-tools" type="radio" name="tools" onclick="javascript: submit()"
                                value="bags" id="tool-4">
                            <label class="for-checkbox-tools" for="tool-4">
                                Bags
                            </label>
                            <!--
                            --><input class="checkbox-tools" type="radio" name="tools" onclick="javascript: submit()"
                                value="offer" id="tool-5">
                            <label class="for-checkbox-tools" for="tool-5">
                                <!-- <i class='uil uil-vector-square'></i> -->
                                Offers
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div style="display:flex;justify-content:space-around;" class="row text-center">
            <?php
            if (isset($_POST['tools'])) {
                $cat = $_POST['tools'];
                $result = $database->getDataByFilter($cat);
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['name'], $row['price'], $row['image'], $row['id'], $row['rating']);
                }
            } else {
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['name'], $row['price'], $row['image'], $row['id'], $row['rating']);
                }
            }
            ?>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>