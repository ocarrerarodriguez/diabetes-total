<?php

class index_Controller extends cls_Controller
{
    
    public function __construct($controlador,$metodo) {
        parent::__construct($controlador,$metodo);
        $_index = $this->loadModel('index');
        //cls_Session::tiempo();
    }
    
    public function index()
    {
        $this->_view->titulo = 'Entra en diavetestotal.com';
        $this->_view->renderizar('index', 'inicio',$this->_omenu->get_menu());
        
        
    }
    
}

?>
