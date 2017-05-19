<?php
class insertar_Controller extends cls_Controller{
	public function __construct($controlador,$metodo) {
        parent::__construct($controlador,$metodo);
        $_glucemias = $this->loadModel('glucemias');
        
    }
    
    public function index()
    {
		
        $this->_view->titulo = 'Insertar glucemia';
		//$this->_view->paciente="Carmen Antonia Carreira Rodriguez de la fuente";
		$this->_view->alert=$this->alert();
		$this->_view->renderizar('insertar', 'insertar',$this->_omenu->get_menu());
    }
	public function nuevo()
	{
		
	}
	public function alert()
	{
	$alert1='<div class="alert alert-success alert-dismissible" role="alert" >';
    $alert1.='<button type ="button" class="close" data-dismiss="alert"><span>&times;</span></button>';
    $alert1.='<strong>listo!</strong>registro guardado con exito ... <a href="index.php">home</a></div>';
	$alert2='<div class="alert alert-warning alert-dismissible" role="alert" >';	
	$alert2.='<button type ="button" class="close" data-dismiss="alert"><span>&times;</span></button>';
	$alert2.='<strong>listo!</strong>formulario vacio <a href="index.php">home</a></div>';
	$salida='';
	return$salida;
	}		
   
}
?>