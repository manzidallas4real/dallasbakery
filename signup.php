<?php
// Include the database connection file
include "src/script/config.php";

if(isset($_POST['submit'])){
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    $password = $_POST["password"];
    $cpass = $_POST["cpass"];

    // Hash passwords
    $password = md5($password);
    $cpass = md5($cpass);

    // Check for duplicate username or email
    $duplicate = mysqli_query($conn, "SELECT * FROM `customer` WHERE c_name='$name' OR c_email='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo "<script>alert('Username or Email is Already Taken')</script>";
    } else {
        if($password == $cpass){
            // Insert user data into database
            $query = "INSERT INTO `customer`(`c_name`, `c_email`, `c_phone`, `pass`, `c_location`, `date_created`, `status`) VALUES ('$name','$email','$phone','$password','$location',NOW(),'0')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful');</script>";
        } else {
            echo "<script>alert('Password Does not Match');</script>";
        }
    }
}
?>

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
    <link rel="icon" href="src/img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/stylesheets/style.css">
    <link rel="stylesheet" href="src/stylesheets/effects.css">
    <title>Sign Up</title>
</head>
<body class="form">
    
    <div class="for_form">
        <a id="close" href="index.php"><span class="material-symbols-outlined">close</span></a>
        <div class="logo">
            <img src="src/img/logo.png" alt="Logo For Dallas Bakery" width="220px">
        </div>
        <h1>One Bread or One Cake</h1>
        <h1>Can Change Your Life</h1>
        <form action="" method="POST">
            <input type="text" name="name" id="name" placeholder="Full Name" required>
            <input type="email" name="email" id="email" placeholder="E-mail Address" required>
            <input type="tel" name="phone" id="phone" placeholder="Phone Number" required>
            <input type="text" name="location" id="location" placeholder="Your Address" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required>
            <div class="wt-ever">
                <button type="submit" name="submit">Sign Up</button>
                <p>Already a member ? <a id="underl_" href="login.php">Sign In</a></p>
            </div>
        </form>
    </div>  
</body>
</html>
