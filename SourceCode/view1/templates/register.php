<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/register.css">
    <title>Registratie</title>
</head>
<body>

    <header>
        
        <div class="img-div">
            <img class="img-logo" src="../img/logo.png">

            <a class="home" href="./Home.php">Home</a>

            </div>

            <!-- <div class="registratie-div">

            <p class="registratie-p">registratie</p>

            </div> -->

    </header>


    <section class="registratie-section">
        <div class="registratie-wrapper">

            <div class="registratie-1-outer">
                <div class="registratie-1-inner">

                    <b> Registratie van leden vereist om toegang te krijgen tot privé-inhoud</b>
                        <br> Laatst bijgewerkt: maart 30, 2024
                </div>

            </div>

            <div class="registratie-outer">
                <div class="registratie-inner">
                    <form class="form" action="../../controller/EmployeeController.php" method="post">
                        <br>
                        <input type="hidden" name="action" value="registerEmployee">
                        <br>
                        <label for="email">Email:</label>
                        <br>
                        <input type="email" id="email" name="email" placeholder="Voer uw e-mailadres in" required>
                        <br>
                         <label for="password">Wachtwoord:</label>
                         <br>
                        <input type="password" id="password" name="password" placeholder="Voer uw wachtwoord in" required>
                        <br>
                        <label for="confirmed_password">Bevestig wachtwoord:</label>
                        <br>
                        <input type="password" id="confirmed_password" name="confirmed_password" placeholder="Bevestig uw wachtwoord" required>
                        <br><br>
                        <button type="submit">Registreren</button>
                        <br><br>
                    </form>

                    <p>Heeft u al een account? <a href="./index.php">Log hier in</a></p>

                </div>

            </div>

        </div>

    </section>


    <footer>

        <div class="footer-section">

            <div class="footer-wrapper">

                <div class="outer-div">
                    <div class="inner-div">
        
                        <p>masoudkhm1991@yahoo.com</p>
                        <!-- <p>morhaf@gmail.com</p> -->

                        <a  href="https://www.linkedin.com/in/masoud-khm-881255264/" ><img class="icone-linkedin" src="../img/linkedin.png" alt=""></a>
                        
        
                    </div>
                </div>


                <div class="outer-media-div">
                    <div class="inner-media-div">

                        <a class="media-nav" href="https://gitlab.com/"><img class="icone-gitlab" src="../img/gitlab.png" alt=""></a>
                        <a class="media-nav" href="https://www.linkedin.com/in/masoud-khm-881255264/" ><img class="icone-linkedin" src="../img/linkedin.png" alt=""></a>
                        <a class="media-nav" href="https://www.instagram.com/"><img class="icon-insta" src="../img/instagram.png" alt=""></a>
                        <a class="media-nav" href="https://www.facebook.com/masoud.wiz/"><img class="icon-facebook" src="../img/facebook.png" alt=""></a>
        
                    </div>
                </div>


                <div class="outer-div">
                    <div class="inner-div">
        
                        <p>morhaf@gmail.com</p>

                        <a  href="https://www.linkedin.com/in/masoud-khm-881255264/" ><img class="icone-linkedin" src="../img/linkedin.png" alt=""></a>


        
                    </div>
                </div>
    
            </div>

        </div>

    </footer>

    
    
</body>
</html>

