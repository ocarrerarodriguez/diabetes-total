<?php
abstract class cls_Controller
{
    protected $_view;
    //protected $_menu;
    public $_omenu;
    protected $controlador;
    protected $metodo;
    
    public function __construct($controlador,$metodo) 
    {
        $this->setear_menu($controlador,  $metodo);
        $this->_view = new cls_View(new cls_Request);
    }
    
    abstract public function index();
    //abstract public function get_menu();
    //abstract public function set_menu($vista);
    
    protected function loadModel($modelo)
    {
        $modelo = $modelo . '_Model';
        $rutaModelo = ROOT . 'modelos' . DS . $modelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo();
            //echo($rutaModelo);
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }
    
    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'librerias' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
    
    protected function getTexto($clave)
    {
        //echo"clave".$clave."//valor//".$_POST[$clave];//quitar cuando prceda
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
        $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
        return $_POST[$clave];
            
        }
        
        return '';
    }
    
    protected function getInt($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        
        return 0;
    }
    
    protected function redireccionar($ruta = false)
    {
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }
      protected function filtrarInt($int)
    {
        $int = (int) $int;
        
        if(is_int($int)){
            return $int;
        }
        else{
            return 0;
        }
    }
    
    protected function getPostParam($clave)
    {
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }
    
    protected function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);
            
            if(!get_magic_quotes_gpc()){
                $_POST[$clave] = mysql_escape_string($_POST[$clave]);
            }
            
            return trim($_POST[$clave]);
        }
    }
    
    protected function getAlphaNum($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
        
    }
    public function setear_menu($controlador,$metodo)
    {
        
        $this->controlador=$controlador;
        $this->metodo=$metodo;
        $this->definir_menu();
        
        
        
    }
    public function definir_menu()
    {
        $ruta_menu=APP_PATH.'cls_menu.php';
        if(is_readable($ruta_menu))
        {
            require_once $ruta_menu;
            $this->_omenu=new cls_menu();
            $this->_omenu->set_menu($this->controlador,  $this->metodo);
           
        }
    }
    

}

?>

