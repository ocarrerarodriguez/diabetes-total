<?php

class register_Controller extends cls_Controller
{
    
    public function __construct($controlador,$metodo) {
        parent::__construct($controlador,$metodo);
        $_index = $this->loadModel('index');
        //cls_Session::tiempo();
    }
    
    public function index()
    {
        $this->_view->titulo = 'Registrate en Diabetes Total';
        $this->_view->renderizar('register', 'register',$this->_omenu->get_menu());
        
        
    }
    
}

?>