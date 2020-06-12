<?php
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Travel Bird : Results</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>

<body>
    <!--Main container starts here-->
    <div class="main_wrapper">
        <!--Header starts here-->
        <?php include 'includes/header.php'; ?>
        <!--Header ends here-->
        <!--Navbar starts here-->
        <?php include 'includes/navbar.php'; ?>
        <!--Navbar ends here-->
        <!--Content starts here-->
        <div class="content_wrapper">
            <div class="sidebar">
                <div id="sidebar_title"><b>Categories</b></div>
                <ul id="cats">
                    <?php getCats(); ?>
                </ul>
                <br>
                <div id="sidebar_title"><b>Types</b></div>
                <ul id="cats">
                    <?php getTypes(); ?>
                </ul>
            </div>
            <div id="content_area">
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Welcome Guest! <b
                                style="color: yellow;">Shopping Cart-</b> Total Items: Total Price: <a href="cart.php"
                                                                                                       style="color: yellow;">Go to Cart</a></b></span>
                </div>
                <div id="packages_box">
                    <?php
                    if (isset($_GET['search'])) {

                        $search_query = $_GET['user_query'];

                        $get_pack = "select * from packages where package_keywords like '%$search_query%'";

                        $run_pack = mysqli_query($con, $get_pack);

                        while ($row_pack = mysqli_fetch_array($run_pack)) {
                            $pack_id = $row_pack['package_id'];
                            $pack_cat = $row_pack['package_cat'];
                            $pack_type = $row_pack['package_type'];
                            $pack_title = $row_pack['package_title'];
                            $pack_price = $row_pack['package_price'];
                            $pack_image = $row_pack['package_image'];

                            echo "
                            <div id='single_package'>
                            <h3>$pack_title</h3>
                            <img src='admin_area/package_images/$pack_image' width='180' height='180'>
                            <p><b> $ $pack_price</b></p>
                            <a href='details.php?pack_id=$pack_id' style='float: left;'>Details</a>
                            <a href='index.php?pack_id=$pack_id'><button style='float: right;'>Book</button></a>
                            </div>
                            ";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--Content ends here-->
        <!--footer starts-->
        <?php include "includes/footer.php";?>
        <!--footer ends-->
    </div>
    <!--Main container ends here-->
</body>

</html>