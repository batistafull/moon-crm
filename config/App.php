<?php

require_once __DIR__ . '/Module.php'; // Asegura que Module está disponible antes de cargar módulos

class App
{
    protected $module;
    protected $action;

    public function __construct()
    {
        $this->module = $_GET['module'] ?? 'home';  // Módulo por defecto
        $this->action = $_GET['action'] ?? 'index'; // Acción por defecto
    }

    public function run()
    {
        $this->route();
    }

    protected function route()
    {
        $moduleClass = ucfirst($this->module); // Convierte "home" en "Home"
        $moduleFile = __DIR__ . "/../modules/{$this->module}/{$moduleClass}.php";

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
}
