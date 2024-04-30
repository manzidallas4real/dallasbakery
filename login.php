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
    <title>Sign In</title>
</head>
<body class="form">
    
    <div class="for_form">
        <a id="close" href="index.php"><span class="material-symbols-outlined">close</span></a>
        <div class="logo">
            <img src="src/img/logo.png" alt="Logo For Dallas Bakery" width="220px">
        </div>
        <h1>One Bread or One Cake</h1>
        <h1>Can Change Your Life</h1>
        <form action="" method="post">
            <input type="text" name="email" placeholder="E-mail address or phone number"><br>
            <input type="password" name="password" placeholder="Password">
            <div class="fgt">
                <div>
                    <input type="checkbox">
                    <label for="checkbox">Remember me</label>
                </div>
                <a id="underl_" href="#">Forgot Password?</a>
            </div>
            <div class="wt-ever">
                <button type="submit">Sign in</button>
                <p>Not a member yet?  <a id="underl_" href="signup.php">Sign Up</a></p>
            </div>
        </form>

    </div>  
</body>
</html>