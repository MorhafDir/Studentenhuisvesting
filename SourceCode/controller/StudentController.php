<?php

require_once __DIR__ . '/../model/Student.php';

class StudentController {
    private $studentModel;

    public function __construct() {
        $this->studentModel = new Student();
    }

    public function addStudent($name, $age, $email, $number, $preferences) {
        return $this->studentModel->addStudent($name, $age, $email, $number, $preferences);
    }

    public function getAllStudents() {
        return $this->studentModel->getAllStudents();
    }

    public function updateStudent($studentId, $name, $age, $email, $number, $preferences) {
        return $this->studentModel->updateStudent($studentId, $name, $age, $email, $number, $preferences);
    }

    public function deleteStudent($studentId) {
        return $this->studentModel->deleteStudent($studentId);
    }
}

// Instantieer de controller
$studentController = new StudentController();

// Controleer of er een POST-verzoek is gedaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of alle vereiste velden zijn ingevuld
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        // Roep de juiste methode aan op basis van de actie
        switch ($action) {
            case 'addStudent':
                if (isset($_POST['name'], $_POST['age'], $_POST['email'], $_POST['number'], $_POST['preferences'])) {
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];
                    $number = $_POST['number'];
                    $preferences = $_POST['preferences'];
                    $result = $studentController->addStudent($name, $age, $email, $number, $preferences);
                    echo $result;
                } else {
                    echo "Niet alle vereiste velden zijn ingevuld.";
                }
                break;
            case 'updateStudent':
                if (isset($_POST['studentId'], $_POST['name'], $_POST['age'], $_POST['email'], $_POST['number'], $_POST['preferences'])) {
                    $studentId = $_POST['studentId'];
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];
                    $number = $_POST['number'];
                    $preferences = $_POST['preferences'];
                    $result = $studentController->updateStudent($studentId, $name, $age, $email, $number, $preferences);
                    echo $result;
                } else {
                    echo "Niet alle vereiste velden zijn ingevuld.";
                }
                break;
            case 'deleteStudent':
                if (isset($_POST['studentId'])) {
                    $studentId = $_POST['studentId'];
                    $result = $studentController->deleteStudent($studentId);
                    echo $result;
                } else {
                    echo "Student ID ontbreekt.";
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
