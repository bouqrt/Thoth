<?php

require_once '../app/core/Controller.php';

class StudentController extends Controller
{
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
        $this->view('student/dashboard');
    }

    public function home()
    {
        echo "Accueil Thoth";
    }
}

require_once '../app/core/Auth.php';

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
}