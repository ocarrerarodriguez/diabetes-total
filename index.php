<?php
ini_set('display_errors', 1);
define('DS', DIRECTORY_SEPARATOR);					//separador para las direcciones internas del codigo
define('ROOT', realpath(dirname(__FILE__)) . DS);	//ruta base de la aplicacion 
define('APP_PATH', ROOT . 'aplicacion' . DS);		//ruta hata el directorio aplicacion
try{
    //inclusion de las clases necesarias para la aplicacion
    require_once APP_PATH . 'cls_Config.php';
    require_once APP_PATH . 'cls_Request.php';
    require_once APP_PATH . 'cls_Bootstrap.php';
    require_once APP_PATH . 'cls_Controller.php';
    require_once APP_PATH . 'cls_Model.php';
    require_once APP_PATH . 'cls_View.php';
    require_once APP_PATH . 'cls_Registro.php';
    require_once APP_PATH . 'cls_Database.php';
    require_once APP_PATH . 'cls_Session.php';
    
    cls_Session::init();//inicia la sesion
    cls_Session::set("tiempo", time());
    cls_Session::tiempo();
    cls_Bootstrap::run(new cls_Request);//ejecuta la aplicacion
}
catch(Exception $e){//recoge la escepcion de la clase bootstrap
    echo $e->getMessage();
}

?>
    
