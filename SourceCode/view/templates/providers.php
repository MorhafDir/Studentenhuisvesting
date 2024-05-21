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
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
  <nav>
      <h1>Applicatie</h1>
  </nav>
  <h1>Providers beheren</h1>

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
        <tr>
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
