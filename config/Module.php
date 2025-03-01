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
            include_once __DIR__ . "/../themes/" . $_ENV['THEME_DEFAULT'] . "/manifest.php";
            $this->data['title_crm'] = $manifest['name'];
            
            foreach ($manifest['templates'] as $template) {
                if (!isset($this->data[$template])) {
                    $this->data[$template] = $this->template(__DIR__ . "/../themes/" . $_ENV['THEME_DEFAULT'] . "/templates/{$template}.php");
                }
            }
            extract($this->data);
            if (isset($viewPath) && file_exists($viewPath)) {
                ob_start();
                include $viewPath;
                $content = ob_get_clean();
            } else {
                echo "Error: view not found ({$path}) in module {$this->moduleName}";
            }

            include __DIR__ . "/../themes/" . $_ENV['THEME_DEFAULT'] . "/templates/main.php";
        } else {
            echo "Error: View not found ({$path}) in module {$this->moduleName}";
        }
    }

    public function template($path)
    {
        extract($this->data);
        ob_start();

        include $path;

        return ob_get_clean();
    }
}
