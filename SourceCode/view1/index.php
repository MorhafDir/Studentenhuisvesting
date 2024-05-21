<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/main.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div>
            <img class="img-logo" src="img/logo.png">
        </div>
    </header>

    <section class="img-kop-section">

<div class="img-kop-div">
    <img class="kop-img" src="img/Kop.jpg" alt="">
</div>

</section>


<section class="login-title">

<p class="login-schietlood-p" >Login Het Schietlood</p>

</section>


<section class="login-section">
<div class="login-wrapper">

    <div class="login-outer">
        <div class="login-inner">

            <h1 class="log-in-h-1" >Log in</h1>

            <form class="form-login" action="../controller/EmployeeController.php" method="post">
                <input type="hidden" name="action" value="loginEmployee">
                <label class="label-user" for="email">Email:</label>
                <input class="input-user" type="email" id="email" name="email" required>
                <br><br>
                <label class="label-password" for="password">Password:</label>
                <input class="input-password" type="password" id="password" name="password" required>
                <br><br>
                <button class="login-button" type="submit">Inloggen</button>
                <br><br>
                <p class="account-p" >Nog geen account <a href="templates/register.php">maak hier een account</a></p>
            </form>

        </div>

    </div>

</div>

</section>


<div class="footer-section">

<div class="footer-wrapper">

    <div class="outer-div">
        <div class="inner-div">

            <a class="navbaar" href="https://www.linkedin.com/in/masoud-khm-881255264/" ><img class="icone-linkedin" src="img/linkedin.png" alt=""></a>
            <a class="navbaar" href="https://gitlab.com/"><img class="icone-gitlab" src="img/gitlab.png" alt=""></a>
            <!-- <a class="navbaar" href="https://www.instagram.com/"><img class="icon-insta" src="img/instagram.png" alt=""></a> -->
            <!-- <a class="navbaar" href="https://www.facebook.com/masoud.wiz/"><img class="icon-facebook" src="img/facebook.png" alt=""></a> -->

        </div>
    </div>

</div>
</div>


</body>

        </html>
