<?php

class Home extends Module
{

    public function index()
    {
        $this->auth->requireRole('admin');
        $this->view('home', ['data' => 'hola']);
    }

    public function about()
    {
        
        $contacts = $this->db->query("SELECT * FROM contact");
        echo json_encode($contacts);

        $this->db->close();
    }
}
