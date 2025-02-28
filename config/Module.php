<?php

class Module
{
    protected $moduleName;
    protected $db;

    public function __construct()
    {
        $this->moduleName = get_class($this);
        $this->db = new DatabaseToolkit();
    }

    public function view($path, $data = [])
    {
        $viewPath = __DIR__ . "/../modules/{$this->moduleName}/views/{$path}.php";

        if (file_exists($viewPath)) {
            extract($data); 
            include __DIR__ . "/../themes/".$_ENV['THEME_DEFAULT']."/main.php";
        } else {
            echo "Error: Vista no encontrada ({$path}) en el módulo {$this->moduleName}";
        }
    }
}
