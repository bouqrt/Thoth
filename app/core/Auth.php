<?php

class Auth
{
    public static function check(): bool
    {
        return isset($_SESSION['student_id']);
    }

    public static function login(int $id): void
    {
        $_SESSION['student_id'] = $id;
    }

    public static function logout(): void
    {
        session_destroy();
    }
}