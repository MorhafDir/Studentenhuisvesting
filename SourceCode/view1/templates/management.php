<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentenhuisvesting Beheren - Medewerkers</title>
    <link rel="stylesheet" href="../CSS/.css">
</head>
<body>
  <nav>
      <?php //include 'navbar.php'; ?>
  </nav>
    <div class="container">
        <h2>Studentenhuisvesting Beheren</h2>

        <!-- Koppelen van studenten aan woningen -->
        <h3>Koppelen van studenten aan woningen</h3>
        <form action="link_student_house.php" method="post">
            <label for="student_id">Student ID:</label>
            <input type="number" id="student_id" name="student_id" required>
            <label for="house_id">Woning ID:</label>
            <input type="number" id="house_id" name="house_id" required>
            <button type="submit">Koppelen</button>
        </form>

        <!-- Bekijken van de huisvestingssituatie van een specifieke student -->
        <h3>Bekijken van huisvestingssituatie</h3>
        <form action="view_student_housing.php" method="post">
            <label for="student_id_view">Student ID:</label>
            <input type="number" id="student_id_view" name="student_id_view" required>
            <button type="submit">Bekijken</button>
        </form>

        <!-- Koppelen van studenten aan huisvestingsaanbieders -->
        <h3>Koppelen van studenten aan huisvestingsaanbieders</h3>
        <form action="link_student_provider.php" method="post">
            <label for="student_id_provider">Student ID:</label>
            <input type="number" id="student_id_provider" name="student_id_provider" required>
            <label for="provider_id">Huisvestingsaanbieder ID:</label>
            <input type="number" id="provider_id" name="provider_id" required>
            <button type="submit">Koppelen</button>
        </form>

        <!-- Bekijken van geplaatste studenten -->
        <h3>Bekijken van geplaatste studenten</h3>
        <button onclick="window.location.href='view_placed_students.php'">Bekijken</button>
    </div>
</body>
</html>
