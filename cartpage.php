<?php
  include('./server.php');
  /*session_start();
  $db = mysqli_connect("localhost","root","","electronicstore");*/
  if(isset($_POST["add"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["name"],
				'item_price'		=>	$_POST["price"],
			);
            $item_id=$_GET["id"];
            $item_name=$_POST["name"];
            $item_price=$_POST["price"];
            $query="INSERT INTO shopping_cart(item_id,item_name,item_price) VALUES ('$item_id','$item_name','$item_price')";
            mysqli_query($db,$query);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["name"],
			'item_price'		=>	$_POST["price"],
		);
        $item_name=$_POST["name"];
        $Item_price=$_POST["price"];
        $query="INSERT INTO shopping_cart(item_name,item_price) VALUES ('$item_name','$item_price')";
        mysqli_query($db,$query);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
                $item_name=$values['item_name'];
				unset($_SESSION["shopping_cart"][$keys]);
                $query="DELETE FROM shopping_cart WHERE item_name = '$item_name'";
                mysqli_query($db,$query);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cartpage.php"</script>';
			}
		}
	}
}
/*
	if(isset($_POST["buy"]))
	{

                $query2="SELECT CUST_ID FROM customer WHERE CUST_USERNAME = '$username'";
                $resultuser=$db->query($query2);
				$resultuser=mysqli_fetch_assoc($resultuser);
				$query3="SELECT * FROM shopping_cart";
				$resultitem=$db->query($query3);
				echo "Items";
				var_dump($resultitem);
				echo "username";
				var_dump($resultuser);
				if(mysqli_num_rows($resultitem)>0)
				{
					while($row = mysqli_fetch_assoc($resultitem))
					{
					//$query="INSERT INTO invoice(PRODUCT_ID,CUST_ID) VALUES ('${row['item_id']}','${resultuser['CUST_ID']}')";
					$query="INSERT INTO invoice(PRODUCT_ID,CUST_ID) VALUES ('${row['item_id']}', 2)";
					mysqli_query($db,$query);
					}
					
				}
				
				//echo '<script>window.location="cartpage.php"</script>';
	}
	*/
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
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Electronic Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
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
        <header class="bg-red py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Checkout</h1>
                </div>
            </div>
        </header>

        <!-- Section-->
        <section class="py-5">
        <div style="clear:both"></div>
			<br />
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="30%">Price</th>
						<th width="15%">Total</th>
						<th width="15%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
                        <td>$ <?php echo $values["item_price"]; ?></td>
						<td><a href="cartpage.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + $values["item_price"];
						}
					?>
					<tr>
						<td colspan="2" align="right">Total</td>
						<td>$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
					
				</table>
				
			</div>
			<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
							<form method="post">
                            <input type="submit" name="buy" class="btn btn-outline-dark mt-auto" value="Checkout"></div>
							</form>
							</div>
							
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Team 7</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

		
    </body>
</html>
