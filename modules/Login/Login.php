<?php

class Login extends Module
{
    public function index()
    {
        $this->view('login', ['data' => 'hola']);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $user = $this->db->query("SELECT * FROM usuarios WHERE username = ?", [$username]);
        
            if ($user && password_verify($password, $user[0]['password'])) {
                $this->auth->login($user[0]);
                $this->auth->redirect('/dashboard.php');
            } else {
                echo "Credenciales incorrectas";
            }
        }
    }
}