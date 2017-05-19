<?php
/**
 * Description of glucemias_Model
 *
 * @author lacuato_ssd
 */
class glucemias_Model extends cls_Database
 {
    
    public function __construct()
    {
        parent::__construct(); 
        //database::->table="glucemias";
        
    }
    
    public function delete($id)
    {
		$sql="delete form glucemias where id='".$id."'";
        $req=  mysqli_query(cls_Database::$db, $sql)or die(mysqli_error(DATABASE::$db)."<br> => ".$sql);
        
        return $req;
        
    }
}