<?php 
    $conn = mysqli_connect('localhost','root');
    mysqli_select_db($conn,'electronicstore');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['username'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $password=md5($password);

        $sql="select * from customer where CUST_USERNAME='".$username."' AND CUST_PASSWORD='".$password."'
        limit 1";

        $results=$con->query($sql);

        if(mysqli_num_rows($results)==1){
            header("Location: http://localhost/index.php", true, 301);
            exit();
        }
        else{
            echo "<script>alert('You have entered an incorrect password. Try again!');</script>";
        }
    }

?>
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
                    <h1 class="display-4 fw-bolder">Login</h1>
                    <p style="line-height:3.5em;"></p>
                    <p class="lead fw-normal text-white-50 mb-0"></p>
                    <div class="container">
                        <img class="card-img-top" src="../resources/rcoklick.jpg"/>
                        <p style="line-height:3.5em;"></p>
                        <form action="/login.php" method="post">
                            <p style="line-height:0.5em;">Enter Your Username</p>
                            <div class= "form_input">
                                <input type="text" name="username" placeholder="Username"/>
                </div>
                <p style="line-height:0.5em;"></p>
                <p style="line-height:0.5em;">Enter Your Password</p>
                <div class= "form input">
                    <input type="password" name="password" placeholder="Password"/>
                </div>
                <p style="line-height:3.5em;"></p>
                <input type="submit" name="login_user" value="LOGIN" class="btn btn-outline-light mt-auto"/>
                        </form>
                    </div>
                <p style="line-height:3.5em;"></p>
                <a href = "registration.php">Don't have an account? Register Here</a>
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
