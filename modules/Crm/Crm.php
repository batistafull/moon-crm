<?php


class Crm extends Module
{


    public function __construct()
    {
        parent::__construct();
        if(isset($_GET['crm_module']) && !empty($_GET['crm_module']) ){
            $this->data['crm_module'] = $_GET['crm_module'];
            include_once('vardefs/'.$this->data['crm_module'].'.php');
            $this->data['vardefs'] = $vardefs[$this->data['crm_module']][$_GET['action']];
        }
    }

    public function index(){

    }

    public function list(){
        $this->view('list');
    }

    public function create(){
        $this->data['nombre'] = 'Crear';
        $this->view('create');
    }

    public function edit($id){

    }

    public function delete($id){

    }

    public function detail($id){

    }

   
}   