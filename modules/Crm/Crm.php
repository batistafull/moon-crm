<?php


class Crm extends Module
{


    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['crm_module']) && !empty($_GET['crm_module'])) {
            $this->data['crm_module'] = $_GET['crm_module'];
            include_once('vardefs/' . $this->data['crm_module'] . '.php');
            $this->data['vardefs'] = $vardefs[$this->data['crm_module']][$_GET['action']];
        }
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            $this->data['action'] = $_GET['action'];
        }
        $this->data['menu_list'] = ['Leads', 'Oportunities'];
        $this->data['menu'] = $this->template("modules/{$this->moduleName}/views/menu.php");

    }

    public function index() {}

    public function list()
    {
        $this->auth->requireRole('admin');
        $this->data['title'] = "List {$this->data['crm_module']}";
        $sql = "SELECT * FROM crm_{$this->data['crm_module']}";
        $data_list = $this->db->query($sql);
        $this->data['data_list'] = $data_list;
        $this->view('list');
    }

    public function create()
    {
        $this->data['title'] = "Create {$this->data['crm_module']}";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            foreach ($this->data['vardefs'] as $field => $def) {
                if ($def['required'] && empty($_POST[$field])) {
                    $errors[$field] = "El campo {$def['label']} es requerido.";
                }
            }

            if (empty($errors)) {
                $columns = array_keys($_POST);
                $params = array_values($_POST);
            
                $placeholders = str_repeat('?,', count($columns) - 1) . '?'; // Evita la coma adicional al final
                $sql = "INSERT INTO crm_{$this->data['crm_module']} (" . implode(', ', $columns) . ") 
                        VALUES ($placeholders)";
            
                try {
                    $this->db->execute($sql, $params);
                    $this->data['success'] = "Register created successfully.";
                } catch (Exception $e) {
                    $this->data['errors'] = ["Database error: " . $e->getMessage()];
                }
            
            } else {
                $this->data['errors'] = $errors;
            }
        }
        $this->view('create');
    }

    public function edit()
    {
        if (!isset($_GET['id'])) {
            echo "Register ID not specified.";
        }
        $this->data['id'] = $_GET['id'];
        $this->data['title'] = "Edit {$this->data['crm_module']}";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            foreach ($this->data['vardefs'] as $field => $def) {
                if ($def['required'] && empty($_POST[$field])) {
                    $errors[$field] = "El campo {$def['label']} es requerido.";
                }
            }

            if (empty($errors)) {
                $columns = array_keys($_POST);
                $params = array_values($_POST);
            
                $setClause = implode(' = ?, ', $columns) . ' = ?';
                $sql = "UPDATE crm_{$this->data['crm_module']} 
                        SET $setClause 
                        WHERE id = ?";
            
                $params[] = $this->data['id'];
            
                try {
                    $this->db->execute($sql, $params);
                    $this->data['success'] = "Register updated successfully.";
                } catch (Exception $e) {
                    $this->data['errors'] = ["Database error: " . $e->getMessage()];
                }
            
            } else {
                $this->data['errors'] = $errors;
            }
        }
        $sql = "SELECT * FROM crm_{$this->data['crm_module']} WHERE id = {$this->data['id']}";
        $data_list = $this->db->query($sql);
        if (isset($data_list[0])) {
            $this->data['data_list'] = $data_list[0];
            $this->view('edit');
        } else {
            echo "Register not found.";
        }
    }

    public function delete($id) {}

    public function detail()
    {
        if (!isset($_GET['id'])) {
            echo "Register ID not specified.";
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM crm_{$this->data['crm_module']} WHERE id = {$id}";
        $data_list = $this->db->query($sql);
        if (isset($data_list[0])) {
            $this->data['data_list'] = $data_list[0];
            $this->data['title'] = "Detail {$this->data['crm_module']}";
            $this->view('detail');
        } else {
            echo "Register not found.";
        }
    }
}
