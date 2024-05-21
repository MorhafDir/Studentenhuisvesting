<?php

require_once 'Database.php'; // Inclusief de Database klasse als dat nog niet is gedaan

class Provider {
    private $providerId;
    private $name;
    private $contactdetails;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Methode om een provider toe te voegen
    public function addProvider($name, $contactdetails) {
        // SQL-query om een ​​provider toe te voegen aan de database
        $sql = "INSERT INTO provider (name, contactdetails) VALUES (:name, :contactdetails)";

        // Bereid de query voor
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind de parameters aan de prepared statement
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contactdetails', $contactdetails);

        // Voer de query uit
        if ($stmt->execute()) {
            // Als de toevoeging succesvol is, retourneer true
            return true;
        } else {
            // Als er een fout optreedt, retourneer false
            return false;
        }
    }

    // Methode om alle providers op te halen
    public function getAllProviders() {
        $sql = "SELECT * FROM provider";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Methode om een provider bij te werken
    public function updateProvider($providerId, $name, $contactdetails) {
        // SQL-query om een provider bij te werken in de database
        $sql = "UPDATE provider SET name = :name, contactdetails = :contactdetails WHERE providerId = :providerId";

        // Bereid de query voor
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind de parameters aan de prepared statement
        $stmt->bindParam(':providerId', $providerId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contactdetails', $contactdetails);

        // Voer de query uit
        if ($stmt->execute()) {
            // Als de update succesvol is, retourneer true
            return true;
        } else {
            // Als er een fout optreedt, retourneer false
            return false;
        }
    }

    // Methode om een provider te verwijderen
    public function deleteProvider($providerId) {
        // SQL-query om een provider te verwijderen uit de database
        $sql = "DELETE FROM provider WHERE providerId = :providerId";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':providerId', $providerId);

        if ($stmt->execute()) {
            // Als de verwijdering succesvol is, retourneer true
            return true;
        } else {
            // Als er een fout optreedt, retourneer false
            return false;
        }
    }
}

?>
