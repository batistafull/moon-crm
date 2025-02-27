<?php

class Module
{
    protected $moduleName;

    public function __construct()
    {
        $this->moduleName = get_class($this);
    }

    public function view($path, $data = [])
    {
        $viewPath = __DIR__ . "/../modules/{$this->moduleName}/views/{$path}.php";

        if (file_exists($viewPath)) {
            extract($data); 
            include __DIR__ . "/../themes/main.php";
        } else {
            echo "Error: Vista no encontrada ({$path}) en el módulo {$this->moduleName}";
        }
    }
}
