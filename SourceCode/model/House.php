<?php

require_once 'Database.php'; // Inclusief de Database klasse als dat nog niet is gedaan

class House {
    private $houseId;
    private $location;
    private $size;
    private $price;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Methode om alle huizen op te halen
    public function getAllHouses() {
        $sql = "SELECT * FROM house";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Methode om een huis toe te voegen
    public function addHouse($location, $size, $price) {
        // SQL-query om een huis toe te voegen aan de database
        $sql = "INSERT INTO house (location, size, price) VALUES (:location, :size, :price)";

        // Bereid de query voor
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind de parameters aan de prepared statement
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':price', $price);

        // Voer de query uit
        if ($stmt->execute()) {
            // Return true als de toevoeging succesvol is
            return true;
        } else {
            // Return false als er een fout optreedt
            return false;
        }
    }

    // Methode om een huis bij te werken
    public function updateHouse($houseId, $location, $size, $price) {
        // SQL-query om een huis bij te werken in de database
        $sql = "UPDATE house SET location = :location, size = :size, price = :price WHERE houseId = :houseId";

        // Bereid de query voor
        $stmt = $this->db->getConnection()->prepare($sql);

        // Bind de parameters aan de prepared statement
        $stmt->bindParam(':houseId', $houseId);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':price', $price);

        // Voer de query uit
        if ($stmt->execute()) {
            // Return true als de update succesvol is
            return true;
        } else {
            // Return false als er een fout optreedt
            return false;
        }
    }

    // Methode om een huis te verwijderen
    public function deleteHouse($houseId) {
        // SQL-query om een huis te verwijderen uit de database
        $sql = "DELETE FROM house WHERE houseId = :houseId";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':houseId', $houseId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
?>
