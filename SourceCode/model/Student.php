<?php
require_once 'Database.php'; // Inclusief de Database klasse als dat nog niet is gedaan

class Student {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addStudent($name, $age, $email, $number, $preferences) {
        // SQL-query om een ​​student toe te voegen aan de database
        $sql = "INSERT INTO student (name, age, email, number, preferences) VALUES (:name, :age, :email, :number, :preferences)";

        // Bereid de query voor
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind de parameters aan de prepared statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':preferences', $preferences);

        // Voer de query uit
        if ($stmt->execute()) {
            // Als de registratie succesvol is, stuur de gebruiker door naar de studentenpagina
            header("Location: ../view/templates/students.php");
            exit();
        } else {
            // Als er een fout optreedt, blijf op dezelfde pagina en toon de foutmelding
            echo "Fout bij toevoegen van student aan de database: " . $stmt->errorInfo();
        }
    }

    // Methode om alle studenten op te halen
    public function getAllStudents() {
        $sql = "SELECT * FROM student";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Methode om een student bij te werken
    public function updateStudent($studentId, $name, $age, $email, $number, $preferences) {
        // SQL-query om een student bij te werken in de database
        $sql = "UPDATE student SET name = :name, age = :age, email = :email, number = :number, preferences = :preferences WHERE studentId = :studentId";

        // Bereid de query voor
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind de parameters aan de prepared statement
        $stmt->bindParam(':studentId', $studentId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':preferences', $preferences);

        // Voer de query uit
        if ($stmt->execute()) {
            // Return true als de update succesvol is
            return true;
        } else {
            // Return false als er een fout optreedt
            return false;
        }
    }

    // Methode om een student te verwijderen
    public function deleteStudent($studentId) {
        // SQL-query om een student te verwijderen uit de database
        $sql = "DELETE FROM student WHERE studentId = :studentId";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':studentId', $studentId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
