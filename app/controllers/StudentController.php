<?php

require_once '../app/core/Controller.php';
require_once '../app/core/Auth.php';

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