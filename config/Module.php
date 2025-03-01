<?php

class Module
{
    protected $moduleName;
    protected $db;
    protected $auth;
    protected $data;

    public function __construct()
    {
        $this->moduleName = get_class($this);
        $this->db = new DatabaseToolkit();
        $this->auth = new Auth();
        $this->data = [];
    }

    public function view($path)
    {
        $viewPath = __DIR__ . "/../modules/{$this->moduleName}/views/{$path}.php";

        if (file_exists($viewPath)) {
            extract($this->data); 
            include __DIR__ . "/../themes/".$_ENV['THEME_DEFAULT']."/main.php";
        } else {
            echo "Error: Vista no encontrada ({$path}) en el módulo {$this->moduleName}";
        }
    }
}
