<?php


class cls_Session
{
    //retorno nulo;
    //parametros nulo;
    //funcion que inicia la sesion en php no autentificado
    
    public static function init()
    {
        session_start();
    }
     //retorno nulo;
    //parametros :
    //-$clave->se le pasa la variale a destruir o sin parametros destrulle la sesion ;
    //funcion que inicia la sesion en php no autentificado
    public static function destroy($clave = false)
    {
        if($clave){
            if(is_array($clave)){
                for($i = 0; $i < count($clave); $i++){
                    if(isset($_SESSION[$clave[$i]])){
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            }
            else{
                if(isset($_SESSION[$clave])){
                    unset($_SESSION[$clave]);
                }
            }
        }
        else{
            session_destroy();
        }
    }
    
    public static function set($clave, $valor)
    {
        if(!empty($clave))
        $_SESSION[$clave] = $valor;
    }
    
    public static function get($clave)
    {
        if(isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }
    
    
    
    public static function tiempo()
    {
        if(!cls_Session::get('tiempo') || !defined('SESSION_TIME')){
            throw new Exception('No se ha definido el tiempo de sesion'); 
        }
        
        if(SESSION_TIME == 0){
            return;
        }
        
        if(time() - cls_Session::get('tiempo') > (SESSION_TIME * 60)){
            Session::destroy();
            header('location:' . BASE_URL . 'error/access/8080');
        }
        else{
            cls_Session::set('tiempo', time());
        }
    }
}

?>