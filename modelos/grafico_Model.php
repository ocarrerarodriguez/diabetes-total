<?php
class grafico_Model extends cls_Database
{
    
    public function __construct()
    {
        parent::__construct(); 
        //database::->table="glucemias";
        
    }
    
    public function delete($sql)
    {
        $req=  mysqli_query(cls_Database::$db, $sql)or die(mysqli_error(cls_Database::$db)."<br> => ".$sql);
        
        return $req;
        
    }
}