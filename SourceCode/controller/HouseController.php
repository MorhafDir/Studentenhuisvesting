<?php

require_once __DIR__ . '/../model/House.php';

class HouseController {
    private $houseModel;

    public function __construct() {
        $this->houseModel = new House();
    }

    public function addHouse($location, $size, $price) {
        return $this->houseModel->addHouse($location, $size, $price);
    }

    public function getAllHouses() {
        return $this->houseModel->getAllHouses();
    }

    public function updateHouse($houseId, $location, $size, $price) {
        return $this->houseModel->updateHouse($houseId, $location, $size, $price);
    }

    public function deleteHouse($houseId) {
        return $this->houseModel->deleteHouse($houseId);
    }
}

// Instantieer de controller
$houseController = new HouseController();

// Controleer of er een POST-verzoek is gedaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of alle vereiste velden zijn ingevuld
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        // Roep de juiste methode aan op basis van de actie
        switch ($action) {
            case 'addHouse':
                if (isset($_POST['location'], $_POST['size'], $_POST['price'])) {
                    $location = $_POST['location'];
                    $size = $_POST['size'];
                    $price = $_POST['price'];
                    $result = $houseController->addHouse($location, $size, $price);
                    echo $result;
                } else {
                    echo "Niet alle vereiste velden zijn ingevuld.";
                }
                break;
            case 'updateHouse':
                if (isset($_POST['houseId'], $_POST['location'], $_POST['size'], $_POST['price'])) {
                    $houseId = $_POST['houseId'];
                    $location = $_POST['location'];
                    $size = $_POST['size'];
                    $price = $_POST['price'];
                    $result = $houseController->updateHouse($houseId, $location, $size, $price);
                    echo $result;
                } else {
                    echo "Niet alle vereiste velden zijn ingevuld.";
                }
                break;
            case 'deleteHouse':
                if (isset($_POST['houseId'])) {
                    $houseId = $_POST['houseId'];
                    $result = $houseController->deleteHouse($houseId);
                    echo $result;
                } else {
                    echo "House ID ontbreekt.";
                }
                break;
            default:
                echo "Ongeldige actie.";
        }
    } else {
        echo "Actie ontbreekt.";
    }
}

?>
