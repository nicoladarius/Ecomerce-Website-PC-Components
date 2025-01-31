<!-- connect file -->
<?php 
include('includes/connect.php');
include('functions/common_function.php');
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomerce Website </title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css file -->
    <link rel="stylesheet" href="style.css">

    <style>
      
    </style>

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">

                <img src=".\images\Logo.png" alt="" class="logo">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item() ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price() ?>€</a>
                        </li>
                    </ul>

                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>

                </div>

            </div>
        </nav>

        <!-- calling add to cart function -->
        <?php
        cart();
        ?>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!-- Third Child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communications is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="row">

            <div class="col-md-10">

                <!-- Products -->
                <div class="row">

                    <!-- fetching products -->
                    <?php
                    view_details();
                    get_unique_brands();
                    get_unique_categories();
                    ?>
                    
                </div>  <!-- row end -->
                
            </div>  <!-- col end -->

            <!-- Sidenav -->
            <div class="col-md-2 bg-secondary p-0">

                <!-- Sort by rating -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light"><h4>Sort by Product Rating</h4></a>
                    </li>
                    <!-- <li class="nav-item"><a href="index.php?brand=$brand_id" class="nav-link text-light">$brand_title</a></li> -->
                    <li class="nav-item"><a href="#" class="nav-link text-light">The Highest</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light">The Lowest</a></li>
                    <?php 
                    
                    ?>

                </ul>

                <!-- Brands to be displayed -->
               <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>

                    <?php 
                    getbrands();
                    ?>

                </ul>

               <!-- Categories to be displayed -->
               <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                    
                    <?php 
                    getcategories();
                    ?>

               </ul>

            </div>
     
        </div>
           


        <!-- last child -->
        <!-- include footer -->
        <?php
        include("./includes/footer.php");
        ?>

    </div>






    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>