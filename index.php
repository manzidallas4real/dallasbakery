<?php include "src/script/navbar.php" ?>


<body>
    <header>
        <div class="header">
            <div class="text">
                <p class="regular">TASTES DELICIOUS OF NEW</p>
                <h1 class="big">HUMBURGER</h1>
            </div>
        
            <div class="content">
                <img src="src/img/Burger.png" alt="Image for header">
                <div>
                    <a href="#"><p>ORDER NOW</p></a>
                </div>
                
            </div>
            
        </div>
    </header>

    <section>
        <p>MENU</p>
        <h2 class="regular">DELICIOUS BAKES TO CHEER UP YOUR MOOD.</h2>
        <h2 class="regular">QUICK AND EASY, GREAT FOR A QUICK BITE !</h2>
        
        <div class="product">
            <?php
                $fetch = $pdo->prepare("SELECT * FROM product");
                $fetch->execute();
                $result = $fetch->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row){?>
                    <!-- $product_name = 
                    $product_img = $row['product_img'];
                    $product_recipy = $row['product_recipy'];
                    $product_price = ;
                    -->
                
                    <div class="carma">
                        <div>
                            <img src="src/img/Burger.png" alt="Product Picture">
                        </div>
                        <div>
                            <h3 class="title"><?php echo $row['product_name'];?></h3>
                            <h5 class="price"><?php echo $row['product_price'];?> $</h5>
                        </div>
                        <div>
                            <a href="#"><p>Add to Cart</p></a>
                            <a href="product.php?id=<?php echo $row['product_id']; ?>"><p>Buy Now</p></a>
                        </div>
                    </div>
                    <!-- echo $product_img; -->
                    <!-- echo $product_recipy; -->
            <?php
                }?>
        </div>

             <!-- <div class="carma">
                <div>
                    <img src="src/img/Burger.png" alt="Product Picture">
                </div>
                <div>
                    <h3 class="title">CHEESEBURGER</h3>
                    <h5 class="price">7$</h5>
                </div>
                <div>
                    <a href="#"><p>Add to Cart</p></a>
                    <a href="product.php"><p>Buy Now</p></a>
                </div>
            </div>

            <div class="carma">
                <div>
                    <img src="src/img/Burger.png" alt="Product Picture">
                </div>
                <div>
                    <h3 class="title">CHEESEBURGER</h3>
                    <h5 class="price">7$</h5>
                </div>
                <div>
                    <a href="#"><p>Add to Cart</p></a>
                    <a href="#"><p>Buy Now</p></a>
                </div>
            </div>

            <div class="carma">
                <div>
                    <img src="src/img/Burger.png" alt="Product Picture">
                </div>
                <div>
                    <h3 class="title">CHEESEBURGER</h3>
                    <h5 class="price">7$</h5>
                </div>
                <div>
                    <a href="#"><p>Add to Cart</p></a>
                    <a href="#"><p>Buy Now</p></a>
                </div>
            </div>


            <div class="carma">
                <div>
                    <img src="src/img/Burger.png" alt="Product Picture">
                </div>
                <div>
                    <h3 class="title">CHEESEBURGER</h3>
                    <h5 class="price">7$</h5>
                </div>
                <div>
                    <a href="#"><p>Add to Cart</p></a>
                    <a href="#"><p>Buy Now</p></a>
                </div>
            </div>


            <div class="carma">
                <div>
                    <img src="src/img/Burger.png" alt="Product Picture">
                </div>
                <div>
                    <h3 class="title">CHEESEBURGER</h3>
                    <h5 class="price">7$</h5>
                </div>
                <div>
                    <a href="#"><p>Add to Cart</p></a>
                    <a href="#"><p>Buy Now</p></a>
                </div>
            </div>


            <div class="carma">
                <div>
                    <img src="src/img/Burger.png" alt="Product Picture">
                </div>
                <div>
                    <h3 class="title">CHEESEBURGER</h3>
                    <h5 class="price">7$</h5>
                </div>
                <div>
                    <a href="#"><p>Add to Cart</p></a>
                    <a href="#"><p>Buy Now</p></a>
                </div>
            </div>  -->
        </div>
    </section>
    
<?php include "src/script/footer.php"?>

</body>
</html>
