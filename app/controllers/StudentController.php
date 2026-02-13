<?php

require_once '../app/core/Controller.php';
require_once '../app/core/Auth.php';
require_once '../app/models/Student.php';

class StudentController extends Controller
{
    public function home()
    {
        echo "Accueil Thoth";
    }

    public function login()
    {
        $this->view('student/login');
    }

    public function register()
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validation simple
        if ($name === '' || $email === '' || $password === '') {
            echo "Tous les champs sont obligatoires";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email invalide";
            return;
        }

        $studentModel = new Student();

        if ($studentModel->findByEmail($email)) {
            echo "Email déjà utilisé";
            return;
        }

        // Hash du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $studentModel->create($name, $email, $hashedPassword);

        // Redirection vers login
        header('Location: /login');
        exit;
        }

    // GET → afficher le formulaire
    $this->view('student/register');
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }

        $this->view('student/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        header('Location: /login');
        exit;
    }
}