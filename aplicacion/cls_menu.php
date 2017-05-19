<?php

class cls_menu
{
    private $menu_inerno =array();
    public function __construct() 
    {
        
       
    }
    public function set_menu($controller,$vista)
    {
          $funcion=$controller.'_'.$vista;
          //$funcion=$funcion.$vista;
          if(is_callable($funcion,true))
          {
          call_user_func_array(array('cls_menu',$funcion),array(''));
          }
          else 
          {
            echo ('no has definido un metodo para: '.$funcion);
          }
    }
    public function get_menu()
    {
        return $this->menu_inerno;
    }
    private function index_index () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                ),
         array(
             'id' => 'insertar archivo',
             'titulo' => 'insertar archivo',
             'enlace' => BASE_URL . 'insertar_archivo'
         ),
         array(
             'id' => 'post',
             'titulo' => 'post',
             'enlace' => BASE_URL . 'post'
         )
        );
    }
    private function register_index () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }

	private function grafico_index () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
	private function glucemias_index () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
	private function insertar_index () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
    private function post_index () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
      private function post_nuevo () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
    private function post_editar () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
    private function post_eliminar () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
     private function insertar_archivo_insertar () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
    private function insertar_archivo_index () 
    {
     $this->menu_inerno=array(
         array(
                'id' => 'home',
                'titulo' => 'home',
                'enlace' => BASE_URL . 'index'
                ),
         array(
                'id' => 'glucemias',
                'titulo' => 'glucemias',
                'enlace' => BASE_URL . 'glucemias'
				),
         array(
                'id' => 'insertar',
                'titulo' => 'insertar',
                'enlace' => BASE_URL . 'insertar'
                ),
        
		array(
                'id' => 'grafico',
                'titulo' => 'grafico',
                'enlace' => BASE_URL . 'grafico'
                )
        );
    }
}
