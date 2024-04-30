<?php
// Include the database connection file
include('src/script/connection.php');
// Error reporting disabled for production
// error_reporting(0);

if(isset($_POST['submit'])){
    // Getting Post Values
    $fullname = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $password = md5($_POST['password']);

    // Query for validation of username and email-id
    $sql = "SELECT * FROM customer WHERE (name=:name OR email=:uemail)";
    $queryt = $pdo->prepare($sql);
    $queryt->bindParam(':name', $fullname, PDO::PARAM_STR);
    $queryt->bindParam(':email', $email, PDO::PARAM_STR);
    $queryt->execute([
        'name' => $fullname,
        'email' => $email
    ]);
    $results = $queryt->fetchAll(PDO::FETCH_OBJ);

    if($queryt->rowCount() == 0){
        // Query for Insertion
        $sql = "INSERT INTO customer (name, email, phone, password, location) VALUES (:fname, :uemail, :umobile, :upassword, :uname)";
        $stmt = $pdo->prepare($sql);
        // Binding Post Values
        $stmt->bindParam(':name', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':uemail', $email, PDO::PARAM_STR);
        $stmt->bindParam(':umobile', $mobile, PDO::PARAM_INT);
        $stmt->bindParam(':upassword', $password, PDO::PARAM_STR);
        $stmt->bindParam(':uname', $location, PDO::PARAM_STR);
        // $stmt->execute();
        $lastInsertId = $pdo->lastInsertId();
        
        if($lastInsertId){
            $msg = "You have signed up successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
    } else {
        $error = "Username or Email-id already exist. Please try again";
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
    <link rel="icon" href="img/logo.png">
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
        <form action='' method="POST">
            <input type="text" name="name" id="name" placeholder="Full Name" required>
            <input type="email" name="email" id="email" placeholder="E-mail Address" required>
            <input type="tel" name="phone" id="phone" placeholder="Phone Number" required>
            <input type="text" name="location" id="location" placeholder="Your Address" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <div class="wt-ever">
                <button type="submit" name="submit">Sign Up</button>
                <p>Already a member ? <a id="underl_" href="login.php">Sign In</a></p>
            </div>
        </form>
    </div>  
</body>
</html>
