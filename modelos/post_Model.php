<?php

class post_Model extends cls_Database
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getPosts()
    {
        $sql=("select * from posts");
        $post = mysqli_query(cls_Database::$db, $sql);
        $result=array();
        while($datos= mysqli_fetch_object($post))
        {
            $result[]=$datos;
        }
        return $result;
    }
    
    public function getPost($id)
    {
        $id = (int) $id;
        $sql=("select * from posts where id = $id");
        $post =  mysqli_query(cls_Database::$db, $sql);
                
       $result=array();
        while($datos= mysqli_fetch_object($post))
        {
            $result[]=$datos;
        }
        return $result;
    }
    
    public function insertarPost($titulo, $cuerpo)
    {
        
                $sql = "INSERT INTO posts VALUES (null, '".$titulo."','".$cuerpo."');";
                $post =  mysqli_query(cls_Database::$db, $sql);

    }
    
    public function editarPost($id, $titulo, $cuerpo)
    {
        $id = (int) $id;
        
        $this->_db->prepare("UPDATE posts SET titulo = :titulo, cuerpo = :cuerpo WHERE id = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':titulo' => $titulo,
                           ':cuerpo' => $cuerpo
                        ));
    }
    
    public function eliminarPost($id)
    {
        $id = (int) $id;
        $sql="DELETE FROM posts WHERE id = $id";
        $post =  mysqli_query(cls_Database::$db, $sql);
    }
}

?>
