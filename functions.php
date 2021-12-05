<div class="container">
    <div class="row">
        <?php
            $con = mysqli_connect('localhost','root',"","electronicstore");
            $sql = "SELECT * FROM product";
            $results = $con->query($sql);
            while($products = mysqli_fetch_assoc($results)) {
                <h4> <? = $product['PRODUCT_DESC']; ?> </h4>
                <img src="<?= $product['PRODUCT_IMG'];?>"height ="200" width="200" alt="<? = $product['PRODUCT_DESC'];?>"/>
                <p class="lprice">$<?= $product['PRODUCT_PRICE'];?></p>
            };
        ?>
    </div>
</div>