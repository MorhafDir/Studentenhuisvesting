<?php
require_once '../../controller/ProviderController.php';

// Maak een instantie van de controller
$providerController = new ProviderController();

// Haal alle providers op
$providers = $providerController->getAllProviders();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Providers beheren</title>
    <link rel="stylesheet" href="../CSS/provider.css">
</head>
<body>

    <header class="provider-header" >

        <h1 class="pro-h1" >Providers beheren</h1>

        <div class="login-register">
            <a class="register" href="templates/register.php">Registratie</a>
            <a class="register" href="../index.php">Login</a>
        </div>

        <div>
            <img class="img-logo" src="../img/logo.png">
        </div>

        <div class="container-nav">

            <a class="home-pagina" href="./Home.php">Home</a>
            <a class="home-pagina" href="./about.php">OverOns</a>
            <a class="home-pagina" href="./students.php">Studenten Beheer</a>
            <a class="home-pagina" href="./providers.php">Aanbider Beheren</a>
            <a class="home-pagina" href="./houses.php">woning Beheer</a>
            <a class="home-pagina" href="./managemen.php">Overzicht woning</a>
            <a class="home-pagina" href="#">Overzicht student</a>


        </div>

    </header>

  

  <h2>Provider toevoegen</h2>
  <form action="../../controller/ProviderController.php" method="post">
      <input type="hidden" name="action" value="addProvider">
      <!-- Formulier voor het toevoegen van een provider -->
      <!-- Vul de juiste invoervelden in -->
      Naam: <input type="text" name="name" required><br>
      Contactdetails: <input type="text" name="contactdetails" required><br>
      <input type="submit" value="Toevoegen">
  </form>

  <table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Contactdetails</th>
        <th>Acties</th>
    </tr>
    <?php foreach ($providers as $provider): ?>
        <tr class="tr">
            <td><?php echo $provider['providerId']; ?></td>
            <td>
                <form action="../../controller/ProviderController.php" method="post">
                    <input type="hidden" name="action" value="updateProvider">
                    <input type="hidden" name="providerId" value="<?php echo $provider['providerId']; ?>">
                    <input type="text" name="name" value="<?php echo $provider['name']; ?>">
            </td>
            <td><input type="text" name="contactdetails" value="<?php echo $provider['contactdetails']; ?>"></td>
            <td>
                <button type="submit">Wijzigen</button>
                </form>
                <form action="../../controller/ProviderController.php" method="post">
                    <input type="hidden" name="action" value="deleteProvider">
                    <input type="hidden" name="providerId" value="<?php echo $provider['providerId']; ?>">
                    <button type="submit">Verwijderen</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
