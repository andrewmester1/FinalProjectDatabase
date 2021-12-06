<?php include('./server.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Electronic Store</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        
        <!-- Navigation
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Electronic Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="laptops.php">Laptops</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="tv.php">TVs</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="games.php">Games</a></li>
                               
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>-->
        <!-- Header-->
        <header class="bg-red py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Registration</h1>
                    <p style="line-height:3.5em;"></p>
                    <p class="lead fw-normal text-white-50 mb-0"></p>
                    <div class="container">
                        <p style="line-height:3.5em;"></p>
                        <form action="/registration.php" method="post"> 
			                <?php include('./errors.php')?>
                            <p style="line-height:0.5em;">Create a Username</p>
                            <div class= "form_input">
                                <input type="text" name="username" placeholder="Create a Username" required/>
                                <p style="line-height:0.5em;"></p>
                </div>
                <p style="line-height:0.5em;">Create a Password</p>
                <div class= "form input">
                    <input type="password" name="password" placeholder="Create a password" required/>
                    <p style="line-height:0.5em;"></p>
                </div>
                <p style="line-height:0.5em;">Enter First Name</p>
                <div class= "form_input">
                                <input type="text" name="first_name" placeholder="Enter First Name" required/>
                                <p style="line-height:0.5em;"></p>
                </div>
                <p style="line-height:0.5em;">Enter Last Name</p>
                <div class= "form_input">
                                <input type="text" name="last_name" placeholder="Enter Last Name" required/>
                                <p style="line-height:0.5em;"></p>
                </div>
                <p style="line-height:0.5em;">Enter Your Email</p>
                <div class= "form input">
                    <input type="email" name="email" placeholder="Enter Email" required/>
                    <p style="line-height:0.5em;"></p>
                </div>
                <p style="line-height:3.5em;"></p>
                <input type="submit" name="reg_user" value="REGISTER" class="btn btn-outline-light mt-auto"/>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                   
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
