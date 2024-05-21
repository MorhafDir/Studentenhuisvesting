<?php
require_once '../model/Employee.php'; // Include the Employee model

class EmployeeController {
    private $db;
    private $employeeModel;

    public function __construct() {
        $this->db = new Database(); // Initialize the database connection
        $this->employeeModel = new Employee($this->db);
    }

   // Method to handle user registration
   public function registerEmployee($email, $password, $confirmed_password) {
       // Roep de juiste methode aan op het model
       return $this->employeeModel->registerEmployee($email, $password, $confirmed_password);
   }

   // Method to handle user login
   public function loginEmployee($email, $password) {
       // Roep de juiste methode aan op het model
       return $this->employeeModel->loginEmployee($email, $password);
   }
}

// Controleer of er een POST-verzoek is gedaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeController = new EmployeeController();

    // Haal de ingediende gegevens op
    $action = $_POST['action'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Roep de juiste methode aan op basis van de actie
    if ($action == 'registerEmployee') {
        $confirmed_password = $_POST['confirmed_password'];
        $result = $employeeController->registerEmployee($email, $password, $confirmed_password);
        echo $result;
    } elseif ($action == 'loginEmployee') {
        $result = $employeeController->loginEmployee($email, $password);
        echo $result;
    }
}
?>
