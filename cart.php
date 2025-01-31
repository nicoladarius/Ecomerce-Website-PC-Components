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
    <title>Ecomerce Website - Cart details </title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css file -->
    <link rel="stylesheet" href="style.css">

    <style>
    .cart_img{
        width: 80px;
        height: 80px;
        object-fit: contain;
    }
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
                       
                    </ul>


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

       <!-- fourth child - table-->
       <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php code to display dynamic data -->
                        <?php 
                        
                        $get_ip_address = getIPAddress();
                        $total_price=0;
                        $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                        $result=mysqli_query($con,$cart_query);
                    
                        while($row=mysqli_fetch_array($result)){
                            $product_id=$row['product_id'];
                            $select_products="Select * from `products` where product_id='$product_id'";
                            $result_products=mysqli_query($con,$select_products);
                    
                            while($row_product_price=mysqli_fetch_array($result_products)){
                                $product_price=array($row_product_price['product_price']);
                                $price_table=$row_product_price['product_price'];
                                $product_title=$row_product_price['product_title'];
                                $product_image1=$row_product_price['product_image1'];
                                $product_values=array_sum($product_price);
                                $total_price+=$product_values;
                        ?>

                        <tr>
                            <td> <?php echo $product_title ?> </td>
                            <td> <img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart_img"> </td>
                            <td> <input type="text" name="qty" class="form-input w-50"> </td>

                            <?php  
                            $get_ip_address = getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities=$_POST['qty'];
                                $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_address'";
                                $result_products_quantity=mysqli_query($con,$update_cart);
                                $total_price=$total_price*$quantities;
                            }
                            ?>
                            
                            <td> <?php echo $price_table ?> € </td>
                            <td> <input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"> </td>
                                <td>
                                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                                    <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                                   
                                </td>
                        </tr>

                        <?php
                            }
                        } 
                        ?>

                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex mb-5">
                    <h4 class="p-3">Subtotal:<strong class="text-info"> <?php echo $total_price ?>€</strong></h4>
                    <a href="index.php"><button class="bg-info px-3 py-2 border-0 mx-3">Continue Shopping</button></a>
                    <a href="#"><button class="bg-secondary px-3 py-2 border-0 text-light">Checkout</button></a>
                </div>

            </div>
        </div>
        </form>
        <!-- function to remove items -->
        <?php
        remove_cart_item();
        ?>
        





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