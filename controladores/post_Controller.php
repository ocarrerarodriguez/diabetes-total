<?php

class post_Controller extends cls_Controller
{
    private $_pos;
    
    public function __construct($controlador,$metodo) {
        parent::__construct($controlador,$metodo);
        $this->_pos = $this->loadModel('post');
        //echo("cargado el controlador");
    }
    
    public function index()
    {
        //$this->_post = $this->loadModel('post');->
        //$datos=$_glucemias::query($sql);
        $sql=("select * from posts");
        $this->_view->posts = $this->_pos->getPosts();
        $this->_view->titulo = 'Post';
        
        $this->_view->renderizar('index','post',$this->_omenu->get_menu());
    }
    
    public function nuevo()
    {
        //Session::accesoEstricto(array('usuario'), true);
        
        $this->_view->titulo = 'Nuevo Post';
        //$this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo del post';
                $this->_view->renderizar('nuevo', 'post',$this->_omenu->get_menu());
                exit;
            }
            
            if(!$this->getTexto('cuerpo')){
                $this->_view->_error = 'Debe introducir el cuerpo del post';
                $this->_view->renderizar('nuevo', 'post',$this->_omenu->get_menu());
                exit;
            }
            
            $this->_pos->insertarPost(
                    $this->getPostParam('titulo'),
                    $this->getPostParam('cuerpo')
                    );
            
            $this->redireccionar('post');
        }       
        
        //$this->_view->renderizar('nuevo', 'post');
        $this->_view->renderizar('nuevo','post',$this->_omenu->get_menu());
    }
    
    public function editar($id)
    {
        if(!$this->filtrarInt($id)){
            $this->redireccionar('post');
        }
        
        if(!$this->_pos->getPost($this->filtrarInt($id))){
            $this->redireccionar('post');
        }
        
        $this->_view->titulo = 'Editar Post';
        //$this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo del post';
                //$this->_view->renderizar('editar', 'post');
                $this->_view->renderizar('editar','post',$this->_omenu->get_menu());
                exit;
            }
            
            if(!$this->getTexto('cuerpo')){
                $this->_view->_error = 'Debe introducir el cuerpo del post';
                //$this->_view->renderizar('editar', 'post');
                $this->_view->renderizar('editar','post',$this->_omenu->get_menu());
                exit;
            }
            
            $this->_pos->editarPost(
                    $this->filtrarInt($id),
                    $this->getPostParam('titulo'),
                    $this->getPostParam('cuerpo')
                    );
            
            $this->redireccionar('post');
        }
        
        $this->_view->datos = $this->_pos->getPost($this->filtrarInt($id));
        //$this->_view->renderizar('editar', 'post');
        $this->_view->renderizar('editar','post',$this->_omenu->get_menu());
    }
    
    public function eliminar($id)
    {
        //Session::acceso('admin');
        if(!$this->filtrarInt($id)){
            $this->redireccionar('post');
        }
        
        if(!$this->_pos->getPost($this->filtrarInt($id))){
            $this->redireccionar('post');
        }
        
        $this->_pos->eliminarPost($this->filtrarInt($id));
        $this->redireccionar('post');
    }
}

?>

