<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class insertar_archivo_Controller extends cls_Controller{
	public function __construct($controlador,$metodo) {
        parent::__construct($controlador,$metodo);
        //$_glucemias = $this->loadModel('glucemias');
        
    }
    
    public function index()
    {
		
        $this->_view->titulo = 'Insertar archivo con glucemias';
        //$this->_view->paciente="Carmen Antonia Carreira Rodriguez de la fuente";
        //$this->_view->alert=$this->alert();
        if(isset($_FILES['archivo'])) 
        {    
            $uploadedfileload="true";
            $msg="";
            $uploadedfile_size=$_FILES['archivo']['size'];
            //echo $_FILES['archivo']['name'];
            if ($uploadedfile_size>200000)
            {
                $msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo  ";
                $uploadedfileload="false";
            }
            if (!($_FILES['archivo']['type'] =="text/plain"))
            {
                $msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos";
                $uploadedfileload="false";
            }
            $destination=__DIR__.'/../uploads/'. $_FILES["archivo"]['name'];
            $target_path=$_FILES['archivo']['tmp_name'];
           //echo "<br>".$destination."<br>".$target_path."<br>".$_FILES['archivo']['error']."<br>";
            
            if($uploadedfileload=="true")
            {              
                if(move_uploaded_file ($target_path,$destination ))
                {
                    $fichero=array();
                    $salida=array();
                    $sql=array();
                    $this->_view->mensaje=$this->alert(1,$msg);
                    $archivo=(BASE_URL.'uploads/'. $_FILES["archivo"]['name']);
                     $fichero = file($archivo);
                        for($i=0;$i<sizeof($fichero);$i++)
                        {
                            $salida[]=explode("\t",$fichero[$i]);  
                        } 
                        //var_dump($salida);
                        array_splice($salida,0,1);
                        for($i=0;$i<sizeof($salida)-1;$i++)
                        {
                            $cadena= "INSERT INTO 'pinchometro'('Tipo de registro', 'Número de registro', 'Mes', 'Fecha', 'Año', 'Hora', 'Minuto', 'Rango de temperatura', 'Nivel de batería', 'Tiempo de toma de comida', 'Resultado de glucosa', 'Resultado de cuerpos cetónicos', 'Número etiqueta inteligente', 'Número tabla', 'Estilo de insulina', 'Datos estilo insulina', 'Valor de corrección', 'Valor cambiado', 'Resultado de insulina', 'Insulina prandial', 'Insulina activa', 'Gramos de carb', 'Tipo de insulina manual', 'Acción prolongada Insulina', 'Insulina en bolo') VALUES ("
                                           .$salida[$i][0].",".$salida[$i][1].",".$salida[$i][2].",".$salida[$i][3].",".$salida[$i][4].
                                           ",".$salida[$i][5].",".$salida[$i][6].",".$salida[$i][7].",".$salida[$i][8].",".$salida[$i][9].
                                           ",".$salida[$i][10].",".$salida[$i][11].",".$salida[$i][12].",".$salida[$i][13].",".$salida[$i][14].
                                           ",".$salida[$i][15].",".$salida[$i][16].",".$salida[$i][17].",".$salida[$i][18].",".$salida[$i][19].
                                           ",".$salida[$i][20].",".$salida[$i][21].",".$salida[$i][22].",".$salida[$i][23].",".$salida[$i][24].");";
                                     $sql["$i"]=($cadena);
                        
                        } 
                        $this->_view->tabla=$salida;
                        $this->_view->sql=$sql;
                        
                        //fclose($archivo);
                }
                else
                {
                   $this->_view->mensaje=$this->alert(2,$msg);
                    
                    
                    
                }
            }
            else
            {
                $this->_view->mensaje= $this->alert(2,$msg);
            }
        }
        $this->_view->renderizar('insertar', 'insertar',$this->_omenu->get_menu());
    }
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function alert($mensaje,$msg="")
	{
            $alert1='<div class="alert alert-success alert-dismissible" role="alert" >';
            $alert1.='<button type ="button" class="close" data-dismiss="alert"><span>&times;</span></button>';
            $alert1.='<strong>Listo!</strong> el archivo ha sido subido satisfactoriamente</div>';
            $alert2='<div class="alert alert-danger alert-dismissible" role="alert" >';	
            $alert2.='<button type ="button" class="close" data-dismiss="alert"><span>&times;</span></button>';
            $alert2.='<strong>listo!</strong> Error al subir el archivo '.$msg.'</div>';
            if ($mensaje==1)
            {
                return$alert1;
            }    
            if ($mensaje==2)
            {
                return$alert2;
            }    
        }		
    













}
?>