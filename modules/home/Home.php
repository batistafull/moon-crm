<?php

class Home extends Module
{

    public function index()
    {
        $this->view('home', ['data' => 'hola']);
    }

    public function about()
    {
        /*$exito = $this->db->execute("INSERT INTO contact (first_name) VALUES (?)", ["Juan"]);
        if ($exito) {
            echo "Usuario insertado correctamente. ID: " . $this->db->lastInsertId();
        }*/

        $contacts = $this->db->query("SELECT * FROM contact");
        echo json_encode($contacts);

        $this->db->close();
    }
}
