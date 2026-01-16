<?php

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $config = require '../config/database.php';
            $port = $config['port'] ?? 3306;
            $dsn = "mysql:host={$config['host']};port=$port;dbname={$config['dbname']};charset={$config['charset']}";

            try {
                self::$instance = new PDO(
                    $dsn,
                    $config['user'],
                    $config['password'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die('Erreur DB : ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}