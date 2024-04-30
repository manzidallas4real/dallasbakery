<?php include "src/script/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/stylesheets/style.css">
    <link rel="stylesheet" href="./src/stylesheets/effects.css">
    <title>Dallas Bakery</title>
</head>

<div class="wid" id="header">
    <nav>
        <a href="index.php" class="logo">
            <img src="src/img/logo.png" alt="Dallas Bakery Logo" width="100px">
            <!-- <h1>Dallas Bakery</h1> -->
        </a>
        <div class="list">
            <ul>
                <a id="header_links" href="./index.php"><li>Home</li></a>
                <a id="header_links" href="#"><li>Menu</li></a>
                <a id="header_links" href="#"><li>Attractive Offers</li></a>
                <a id="header_links" href="#"><li>About Us</li></a>
                <a id="header_links" href="#"><li>Contact</li></a>
            </ul>
        </div>
        <div class="preference">
            <div class="icon-cart">
                <!-- <img src="img/icons/shopping_cart.png" alt="shopping_cart" width="35px"> -->
                <span class="material-symbols-outlined">shopping_bag</span>
            </div>
            <a href="login.php">Login</a>
        </div>
    </nav>
</div>