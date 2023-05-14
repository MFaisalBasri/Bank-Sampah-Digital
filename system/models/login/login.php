<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../../../asset/internal/img/img-local/favicon.ico">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../asset/internal/css/styleLogin.css">
</head>
<body>



    <!-- <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Perhatian!</strong> Ini adalah contoh alert.
    </div> -->

    <div class="loginBox">
    <img src="../../../asset/internal/img/img-local/logo.png" alt="">
        <h1>MASUK DISINI!</h1>
        <form action="cek_login2.php" method="post">
            <div class="inputBox">
                <input type="text" name="email" autocomplete="off" placeholder="Masukan Email"><span><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <div class="inputBox">
                <input type="password" name="password" autocomplete="off" placeholder="Masukan Password"><span><i class="fa fa-lock" aria-hidden="true"></i></span>
            </div>
            <input type="submit" name="login" value="Login">
        </form>
        <a href="#">Lupa Password?</a>
    </div>

    
</body>
</html>