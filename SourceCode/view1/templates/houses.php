<?php
require_once '../../controller/HouseController.php';

// Maak een instantie van de controller
$houseController = new HouseController();

// Haal alle huizen op
$houses = $houseController->getAllHouses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huizen beheren</title>
    <link rel="stylesheet" href="../CSS/main.css">
</head>
<body>
  <nav>
      <h1 >Applicatie</h1>
  </nav>
  <h1>Huizen beheren</h1>

  <h2>Huis toevoegen</h2>
  <form action="../../controller/HouseController.php" method="post">
      <input type="hidden" name="action" value="addHouse">
      <!-- Formulier voor het toevoegen van een huis -->
      <!-- Vul de juiste invoervelden in -->
      Locatie: <input type="text" name="location" required><br>
      Grootte: <input type="text" name="size" required><br>
      Prijs: <input type="number" name="price" required><br>
      <input type="submit" value="Toevoegen">
  </form>

  <table>
    <tr>
        <th>ID</th>
        <th>Locatie</th>
        <th>Grootte</th>
        <th>Prijs</th>
        <th>Acties</th>
    </tr>
    <?php foreach ($houses as $house): ?>
        <tr>
            <td><?php echo $house['houseId']; ?></td>
            <td>
                <form action="../../controller/HouseController.php" method="post">
                    <input type="hidden" name="action" value="updateHouse">
                    <input type="hidden" name="houseId" value="<?php echo $house['houseId']; ?>">
                    <input type="text" name="location" value="<?php echo $house['location']; ?>">
            </td>
            <td><input type="text" name="size" value="<?php echo $house['size']; ?>"></td>
            <td><input type="number" name="price" value="<?php echo $house['price']; ?>"></td>
            <td>
                <button type="submit">Wijzigen</button>
                </form>
                <form action="../../controller/HouseController.php" method="post">
                    <input type="hidden" name="action" value="deleteHouse">
                    <input type="hidden" name="houseId" value="<?php echo $house['houseId']; ?>">
                    <button type="submit">Verwijderen</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
