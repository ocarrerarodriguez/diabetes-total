<?php
abstract class cls_Database
{
    protected static $db;
    public $table;
    public $id;
    public function __construct()
    {
        cls_Database::$db=  mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    public function __destruct()
    {
		cls_Database::$db=null;
    }       
    public function query($sql)
    {
        $req=  mysqli_query(cls_Database::$db, $sql)or die(mysqli_error(cls_Database::$db)."<br> => ".$sql);
        $datos=array();
        while($data= mysqli_fetch_object($req))
        {
            $datos[]=$data;
        }
        return $datos;
        
    }
            
}
?>
