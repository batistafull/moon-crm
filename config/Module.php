<?php

class Module
{
    public function view($path, $data = [])
    {
        $viewPath = __DIR__ . "/../modules/home/views/{$path}.php";

        if (file_exists($viewPath)) {
            extract($data); // Extrae variables del array asociativo
            include __DIR__ . "/../themes/main.php"; // Carga la estructura principal
        } else {
            echo "Error: Vista no encontrada ({$path})";
        }
    }
}
