<?php
require_once '../../controller/StudentController.php';

// Maak een instantie van de controller
$studentController = new StudentController();

// Haal alle studenten op
$students = $studentController->getAllStudents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studenten beheren</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
  <nav>
      <h1>Applicatie</h1>
  </nav>
  <h1>Studenten beheren</h1>

  <h2>Student toevoegen</h2>
  <form action="../../controller/StudentController.php" method="post">
      <input type="hidden" name="action" value="addStudent">
      <!-- Formulier voor het toevoegen van een student -->
      <!-- Vul de juiste invoervelden in -->
      Naam: <input type="text" name="name" required><br>
      Leeftijd: <input type="number" name="age" required><br>
      E-mail: <input type="email" name="email" required><br>
      Telefoonnummer: <input type="text" name="number" required><br>
      Voorkeuren: <input type="text" name="preferences"><br>
      <input type="submit" value="Toevoegen">
  </form>

  <table>
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Leeftijd</th>
        <th>Email</th>
        <th>Telefoonnummer</th>
        <th>Voorkeuren</th>
        <th>Acties</th>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['studentId']; ?></td>
            <td>
                <form action="../../controller/StudentController.php" method="post">
                    <input type="hidden" name="action" value="updateStudent">
                    <input type="hidden" name="studentId" value="<?php echo $student['studentId']; ?>">
                    <input type="text" name="name" value="<?php echo $student['name']; ?>">
            </td>
            <td><input type="number" name="age" value="<?php echo $student['age']; ?>"></td>
            <td><input type="email" name="email" value="<?php echo $student['email']; ?>"></td>
            <td><input type="text" name="number" value="<?php echo $student['number']; ?>"></td>
            <td><input type="text" name="preferences" value="<?php echo $student['preferences']; ?>"></td>
            <td>
                <button type="submit">Wijzigen</button>
                </form>
                <form action="../../controller/StudentController.php" method="post">
                    <input type="hidden" name="action" value="deleteStudent">
                    <input type="hidden" name="studentId" value="<?php echo $student['studentId']; ?>">
                    <button type="submit">Verwijderen</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>




</body>
</html>
