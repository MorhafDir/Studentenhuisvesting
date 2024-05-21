<?php

require_once __DIR__ . '/../model/Provider.php';

class ProviderController {
    private $providerModel;

    public function __construct() {
        $this->providerModel = new Provider();
    }

    public function addProvider($name, $contactdetails) {
        return $this->providerModel->addProvider($name, $contactdetails);
    }

    public function getAllProviders() {
        return $this->providerModel->getAllProviders();
    }

    public function updateProvider($providerId, $name, $contactdetails) {
        return $this->providerModel->updateProvider($providerId, $name, $contactdetails);
    }

    public function deleteProvider($providerId) {
        return $this->providerModel->deleteProvider($providerId);
    }
}


// Instantieer de controller
$providerController = new ProviderController();

// Controleer of er een POST-verzoek is gedaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of alle vereiste velden zijn ingevuld
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        // Roep de juiste methode aan op basis van de actie
        switch ($action) {
            case 'addProvider':
                if (isset($_POST['name'], $_POST['contactdetails'])) {
                    $name = $_POST['name'];
                    $contactdetails = $_POST['contactdetails'];
                    $result = $providerController->addProvider($name, $contactdetails);
                    echo $result;
                } else {
                    echo "Niet alle vereiste velden zijn ingevuld.";
                }
                break;
            case 'updateProvider':
                if (isset($_POST['providerId'], $_POST['name'], $_POST['contactdetails'])) {
                    $providerId = $_POST['providerId'];
                    $name = $_POST['name'];
                    $contactdetails = $_POST['contactdetails'];
                    $result = $providerController->updateProvider($providerId, $name, $contactdetails);
                    echo $result;
                } else {
                    echo "Niet alle vereiste velden zijn ingevuld.";
                }
                break;
            case 'deleteProvider':
                if (isset($_POST['providerId'])) {
                    $providerId = $_POST['providerId'];
                    $result = $providerController->deleteProvider($providerId);
                    echo $result;
                } else {
                    echo "Provider ID ontbreekt.";
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
