<?php

class Controller
{
    protected function view(string $path, array $data = []): void
    {
        extract($data);
        require "../app/views/$path.php";
    }
}