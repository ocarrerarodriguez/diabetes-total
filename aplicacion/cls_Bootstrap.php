<?php
class cls_Bootstrap
{
    public static function run(cls_Request $peticion)
    {
       $controller = $peticion->getControlador().'_Controller';
        $metodo = $peticion->getMetodo();
        $rutaControlador = ROOT . 'controladores' . DS . $controller . '.php';  
               
        $args = $peticion->getArgs();
        
        $class_args=array($peticion->getControlador(),$metodo);
                
            if(is_readable($rutaControlador))
            {
                require_once $rutaControlador;
                if (is_array($class_args) && sizeof($class_args) > 0)
                {
                    $rc = new ReflectionClass($controller);
                    if ($rc->getMethod('__construct')) 
                    {
                        $cls = $rc->newInstanceArgs($class_args);
                        //var_dump ($cls);
			if(isset($args))
                        {    
                            call_user_func_array(array($cls, $metodo), $args);
                        }
                        else
                        {
                            call_user_func(array($cls, $metodo));
                        }          
                    } else 
                    {
                    throw new Exception('no encontrado');
                    }
                }
            }
        }
    }


?>