<?php

require_once __DIR__ . '/Module.php'; // Asegura que Module está disponible antes de cargar módulos

class App
{
    protected $module;
    protected $action;

    public function __construct()
    {
        $this->loadEnv();
        $this->module = $_GET['module'] ?? $_ENV['MODULE_DEFAULT'];
        $this->action = $_GET['action'] ?? $_ENV['ACTION_DEFAULT'];
    }

    public function run()
    {
        $this->route();
    }

    protected function route()
    {
        $moduleClass = ucfirst($this->module);
        $moduleFile = __DIR__ . "/../modules/{$moduleClass}/{$moduleClass}.php";

        if (file_exists($moduleFile)) {
            require_once $moduleFile;

            if (class_exists($moduleClass)) {
                $moduleInstance = new $moduleClass();

                if (method_exists($moduleInstance, $this->action)) {
                    $moduleInstance->{$this->action}();
                } else {
                    echo "Método no encontrado: {$this->action}";
                }
            } else {
                echo "Clase no encontrada: {$moduleClass}";
            }
        } else {
            echo "Módulo no encontrado: {$this->module}";
        }
    }

    protected function loadEnv()
    {
        $path = __DIR__ . '/../.env';
        if (!file_exists($path)) {
            throw new Exception("El archivo .env no existe en la ruta: $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);

            $name = trim($name);
            $value = trim($value);

            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}
