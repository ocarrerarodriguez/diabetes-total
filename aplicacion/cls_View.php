<?php
class cls_View
{
    private $_controlador;
    //private $_js;
    
    
    public function __construct(cls_Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        //$this->_js = array();
    }
    
    public function renderizar($vista, $item = false,$menu)
    {
        $_layoutParams = array(
            'ruta_css' => BASE_URL .'layout'. DS .'css/',
            'ruta_img' => BASE_URL .'layout'. DS . 'img/',
			'ruta_fon' => BASE_URL .'layout'. DS . 'fonts/',
            'ruta_js'  => BASE_URL .'layout'. DS . 'js/',
            'menu' => $menu
        ); 
		$rutaView = ROOT . 'vistas' . DS . $this->_controlador . DS . $vista . '.phtml';
		if(is_readable($rutaView)){
            include_once ROOT .'layout' . DS . DEFAULT_LAYOUT . DS . 'header.min.php';
			include_once ROOT .'layout' . DS . DEFAULT_LAYOUT . DS . 'navbar.min.php';
            include_once $rutaView;
            include_once ROOT .'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.min.php';
        } 
        else {
            throw new Exception('Error de vista');
		}
    }
}

?>
