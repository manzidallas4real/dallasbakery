    <div class="wid">
        <?php include "src/script/navbar.php" ?>
    </div>

   
   <?php
        if(!isset($_REQUEST['id'])) {
            header('location: index.php');
            exit;
        } else {
            // Check the id is valid or not
            $fetch = $pdo->prepare("SELECT * FROM product WHERE product_id=?");
            $fetch->execute(array($_REQUEST['id']));
            $total = $fetch->rowCount();
            $result = $fetch->fetchAll(PDO::FETCH_ASSOC);
            if( $total == 0 ) {
                header('location: index.php');
                exit;
            }
        }

        foreach($result as $row) {
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_recipy = $row['product_recipy'];
            $product_img = $row['product_img'];
            // $product_reviews = $row['product_reviews'];
        }

        // // Getting all categories name for breadcrumb
        // $fetch = $pdo->prepare("SELECT
        //                         t1.ecat_id,
        //                         t1.ecat_name,
        //                         t1.mcat_id,

        //                         t2.mcat_id,
        //                         t2.mcat_name,
        //                         t2.tcat_id,

        //                         t3.tcat_id,
        //                         t3.tcat_name

        //                         FROM tbl_end_category t1
        //                         JOIN tbl_mid_category t2
        //                         ON t1.mcat_id = t2.mcat_id
        //                         JOIN tbl_top_category t3
        //                         ON t2.tcat_id = t3.tcat_id
        //                         WHERE t1.ecat_id=?");
        // $fetch->execute(array($ecat_id));
        // $total = $fetch->rowCount();
        // $result = $fetch->fetchAll(PDO::FETCH_ASSOC);                            
        // foreach ($result as $row) {
        //     $ecat_name = $row['ecat_name'];
        //     $mcat_id = $row['mcat_id'];
        //     $mcat_name = $row['mcat_name'];
        //     $tcat_id = $row['tcat_id'];
        //     $tcat_name = $row['tcat_name'];
        // }


        // $p_total_view = $p_total_view + 1;

        // $fetch = $pdo->prepare("UPDATE tbl_product SET p_total_view=? WHERE p_id=?");
        // $fetch->execute(array($p_total_view,$_REQUEST['id']));


        // $fetch = $pdo->prepare("SELECT * FROM tbl_product_size WHERE p_id=?");
        // $fetch->execute(array($_REQUEST['id']));
        // $result = $fetch->fetchAll(PDO::FETCH_ASSOC);                            
        // foreach ($result as $row) {
        //     $size[] = $row['size_id'];
        // }

        // $fetch = $pdo->prepare("SELECT * FROM tbl_product_color WHERE p_id=?");
        // $fetch->execute(array($_REQUEST['id']));
        // $result = $fetch->fetchAll(PDO::FETCH_ASSOC);                            
        // foreach ($result as $row) {
        //     $color[] = $row['color_id'];
        // }


        // if(isset($_POST['form_review'])) {
            
        //     $fetch = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=? AND cust_id=?");
        //     $fetch->execute(array($_REQUEST['id'],$_SESSION['customer']['cust_id']));
        //     $total = $fetch->rowCount();
            
        //     if($total) {
        //         $error_message = LANG_VALUE_68; 
        //     } else {
        //         $fetch = $pdo->prepare("INSERT INTO tbl_rating (p_id,cust_id,comment,rating) VALUES (?,?,?,?)");
        //         $fetch->execute(array($_REQUEST['id'],$_SESSION['customer']['cust_id'],$_POST['comment'],$_POST['rating']));
        //         $success_message = LANG_VALUE_163;    
        //     }
            
        // }

        // Getting the average rating for this product
        // $t_rating = 0;
        // $fetch = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
        // $fetch->execute(array($_REQUEST['id']));
        // $tot_rating = $fetch->rowCount();
        // if($tot_rating == 0) {
        //     $avg_rating = 0;
        // } else {
        //     $result = $fetch->fetchAll(PDO::FETCH_ASSOC);                            
        //     foreach ($result as $row) {
        //         $t_rating = $t_rating + $row['rating'];
        //     }
        //     $avg_rating = $t_rating / $tot_rating;
        // }

        if(isset($_POST['form_add_to_cart'])) {

            // getting the currect stock of this product
            $fetch = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
            $fetch->execute(array($_REQUEST['id']));
            $result = $fetch->fetchAll(PDO::FETCH_ASSOC);							
            foreach ($result as $row) {
                $current_p_qty = $row['p_qty'];
            }
            if($_POST['p_qty'] > $current_p_qty):
                $temp_msg = 'Sorry! There are only '.$current_p_qty.' item(s) in stock';
                ?>
                <script type="text/javascript">alert('<?php echo $temp_msg; ?>');</script>
                <?php
            else:
            if(isset($_SESSION['cart_p_id']))
            {
                $arr_cart_p_id = array();
                $arr_cart_size_id = array();
                $arr_cart_color_id = array();
                $arr_cart_p_qty = array();
                $arr_cart_p_current_price = array();

                $i=0;
                foreach($_SESSION['cart_p_id'] as $key => $value) 
                {
                    $i++;
                    $arr_cart_p_id[$i] = $value;
                }

                $i=0;
                foreach($_SESSION['cart_size_id'] as $key => $value) 
                {
                    $i++;
                    $arr_cart_size_id[$i] = $value;
                }

                $i=0;
                foreach($_SESSION['cart_color_id'] as $key => $value) 
                {
                    $i++;
                    $arr_cart_color_id[$i] = $value;
                }


                $added = 0;
                if(!isset($_POST['size_id'])) {
                    $size_id = 0;
                } else {
                    $size_id = $_POST['size_id'];
                }
                if(!isset($_POST['color_id'])) {
                    $color_id = 0;
                } else {
                    $color_id = $_POST['color_id'];
                }
                for($i=1;$i<=count($arr_cart_p_id);$i++) {
                    if( ($arr_cart_p_id[$i]==$_REQUEST['id']) && ($arr_cart_size_id[$i]==$size_id) && ($arr_cart_color_id[$i]==$color_id) ) {
                        $added = 1;
                        break;
                    }
                }
                if($added == 1) {
                $error_message1 = 'This product is already added to the shopping cart.';
                } else {

                    $i=0;
                    foreach($_SESSION['cart_p_id'] as $key => $res) 
                    {
                        $i++;
                    }
                    $new_key = $i+1;

                    if(isset($_POST['size_id'])) {

                        $size_id = $_POST['size_id'];

                        $fetch = $pdo->prepare("SELECT * FROM tbl_size WHERE size_id=?");
                        $fetch->execute(array($size_id));
                        $result = $fetch->fetchAll(PDO::FETCH_ASSOC);                            
                        foreach ($result as $row) {
                            $size_name = $row['size_name'];
                        }
                    } else {
                        $size_id = 0;
                        $size_name = '';
                    }
                    
                    if(isset($_POST['color_id'])) {
                        $color_id = $_POST['color_id'];
                        $fetch = $pdo->prepare("SELECT * FROM tbl_color WHERE color_id=?");
                        $fetch->execute(array($color_id));
                        $result = $fetch->fetchAll(PDO::FETCH_ASSOC);                            
                        foreach ($result as $row) {
                            $color_name = $row['color_name'];
                        }
                    } else {
                        $color_id = 0;
                        $color_name = '';
                    }
                

                    $_SESSION['cart_p_id'][$new_key] = $_REQUEST['id'];
                    $_SESSION['cart_size_id'][$new_key] = $size_id;
                    $_SESSION['cart_size_name'][$new_key] = $size_name;
                    $_SESSION['cart_color_id'][$new_key] = $color_id;
                    $_SESSION['cart_color_name'][$new_key] = $color_name;
                    $_SESSION['cart_p_qty'][$new_key] = $_POST['p_qty'];
                    $_SESSION['cart_p_current_price'][$new_key] = $_POST['p_current_price'];
                    $_SESSION['cart_p_name'][$new_key] = $_POST['p_name'];
                    $_SESSION['cart_p_featured_photo'][$new_key] = $_POST['p_featured_photo'];

                    $success_message1 = 'Product is added to the cart successfully!';
                }
                
            }
            else
            {

                if(isset($_POST['size_id'])) {

                    $size_id = $_POST['size_id'];

                    $fetch = $pdo->prepare("SELECT * FROM tbl_size WHERE size_id=?");
                    $fetch->execute(array($size_id));
                    $result = $fetch->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        $size_name = $row['size_name'];
                    }
                } else {
                    $size_id = 0;
                    $size_name = '';
                }
                
                if(isset($_POST['color_id'])) {
                    $color_id = $_POST['color_id'];
                    $fetch = $pdo->prepare("SELECT * FROM tbl_color WHERE color_id=?");
                    $fetch->execute(array($color_id));
                    $result = $fetch->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        $color_name = $row['color_name'];
                    }
                } else {
                    $color_id = 0;
                    $color_name = '';
                }
                

                $_SESSION['cart_p_id'][1] = $_REQUEST['id'];
                $_SESSION['cart_size_id'][1] = $size_id;
                $_SESSION['cart_size_name'][1] = $size_name;
                $_SESSION['cart_color_id'][1] = $color_id;
                $_SESSION['cart_color_name'][1] = $color_name;
                $_SESSION['cart_p_qty'][1] = $_POST['p_qty'];
                $_SESSION['cart_p_current_price'][1] = $_POST['p_current_price'];
                $_SESSION['cart_p_name'][1] = $_POST['p_name'];
                $_SESSION['cart_p_featured_photo'][1] = $_POST['p_featured_photo'];

                $success_message1 = 'Product is added to the cart successfully!';
            }
            endif;
        }
    ?>
    
 
    <div class="product-view">
        <div class="wrap">
            <div class="img_product">
                <img src="img/Burger.png" alt="">
            </div>  
            <div class="desc">
                <div>
                    <h1><?php echo $product_name; ?></h1>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <div class="stars num">
                            <p>42 reviews</p>
                        </div>
                    </div>
            
                    <h3>Description</h3>
                    <p>A burger is a culinary masterpiece that begins with a tender and juicy ground meat patty, typically beef, but sometimes chicken, turkey, or even plant-based alternatives</p>
                    <p><b>Ingredients: </b><?php echo $product_recipy; ?></p>
                    <p>$ <?php echo $product_price; ?></p>
                    <h2>Items:</h2>
                    <div class="items_num">
                        <span class="material-symbols-outlined">add</span>
                        <p id="items_num">1</p>
                        <span class="material-symbols-outlined">remove</span>
                    </div>
                    <div>
                        <h3>Total: <h2><?php echo $product_price; ?> $</h2></h3>
                    </div>
                    <div class="buttons">
                        <a href="#"><p>Add to Cart</p></a>
                        <a href="#"><p>Buy Now</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include "src/script/footer.php"?>

    <script src=""></script>
</body>
</html>