<?php include('./server.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TechMax</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">TechMax</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="nav-link active" aria-current="page" href="tv.php">TVs</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="laptops.php">Laptops</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="games.php">Games</a></li>                                   
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" action="cartpage.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                        </button>
                    </form>
                   
                </div>
                <a class="nav-item"><a class="nav-link" href="login.php">Log Out</a>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">TVs</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Immerse yourself in cinema the way it was meant to be!</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php 
                    $sql = "SELECT * FROM product WHERE PRODUCT_TYPE='TV';";
                    $result = mysqli_query($db,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck>0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {?>
                        <div class="col mb-5">
                        <div class="card h-100">
                        <form method="post" action="cartpage.php?id=<?=$row['PRODUCT_ID']?>">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?= $row['PRODUCT_IMG']?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?=$row['PRODUCT_DESC'];?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2"></div>
                                    <!-- Product price-->
                                    $<?=$row['PRODUCT_PRICE'];?>
                                </div>
                            <input type="hidden" name="name" value="<?=$row['PRODUCT_DESC']?>">
                            <input type="hidden" name="price" value="<?=$row['PRODUCT_PRICE']?>">
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                            <input type="submit" name="add" class="btn btn-outline-dark mt-auto" value="Add to Cart">
                            </div>
                            </div>
                        </div>
                            <!-- Product actions-->
                         <!--   <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                            </div>-->
                            </form>
                        </div>
                    </div>
                        <?php }
                    }?>  
                    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Team 7 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
