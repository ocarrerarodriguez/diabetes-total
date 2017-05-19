<?php

class grafico_Controller extends cls_Controller{
	public function __construct($controlador,$metodo) {
        parent::__construct($controlador,$metodo);
        $_grafico = $this->loadModel('grafico');
        //cls_Session::tiempo();
    }
    
    public function index()
    {
        $_grafico = $this->loadModel('grafico');
        $this->_view->titulo = 'Glucemias del Paciente:';
	$this->_view->paciente="Oscar Carreira Rodriguez";
		
	$ruta='aplicacion'.DS.'LIB_graficos_svg.php';
	require_once $ruta;
		
	$_grafico->table="glucemias";
        $clave=array('fecha1','fecha2','opfecha');
        $variable=$this->form($clave);
        //var_dump($variable);
		
        $fecha1="'".$variable[0]."'";
        $fecha2="'".$variable[1]."'";
        $sql=$this->sql($variable[2]);
        $dia=$variable[3];
        $registro="";
        $sql="SELECT time,glucemia'".$_grafico->table."' FROM `glucemias` WHERE time > $fecha1 and time < $fecha2 ".$sql." order by time";
        $datos=$_grafico::query($sql);
        $registro=$this->datos($datos,str_replace("'","",$fecha1));

        $svg=new graficos_svg($registro,520,740);
        $svg->renderizar($dia,30,30);
        $this->_view->grafico=$svg->get_cadena();
        $this->_view->renderizar('grafico', 'grafico',$this->_omenu->get_menu());
        $_grafico->__destruct();
        
    }
	
	function datos($datos,$min)
	{
		for($i=0;$i<(count($datos));$i++)
		{
			$datos[$i]->valor_px= (strtotime($datos[$i]->time)-strtotime($min))/60;
			
		}
		return $datos;
	}
        function form($clave)
        {
            $valores=array();
            for($i=0;$i<count($clave);$i++)
            {
                if(isset($_POST[$clave[$i]])and $_POST[$clave[$i]]!="")
                {
				$valores[]=$_POST[$clave[$i]];
					
		}
                else
                {
                   $valores[0]=date('Y-m-d', strtotime('-15 day'))." 00:00:00" ;
                   $valores[1]=date('Y-m-d')." 00:00:00" ;
                   $valores[2]=9;
                }
            }
			$d1=new DateTime($valores[0]);
			$d2=new DateTime($valores[1]);
			$str=$d2->diff($d1);
			$valores[3]=$str->days;
			
            return $valores;
        }
		function sql($dato)
		{
			if ($dato==0)
			{
				$sql="and horario = 0";
			}
			if ($dato==1)
			{
				$sql="and horario = 1";
			}
			if ($dato==2)
			{
				$sql="and horario = 2";
			}
			if ($dato==3)
			{
				$sql="and horario = 3";
			}
			if ($dato==4)
			{
				$sql="and horario = 4";
			}
			if ($dato==5)
			{
				$sql="and horario = 5";
			}
			if ($dato==6)
			{
				$sql="and horario = 6";
			} 
			if ($dato==7)
			{
				$sql="and horario = 7";
			}
			if ($dato==8)
			{
				$sql="and horario = 8";
			}
			if ($dato==9)
			{
				$sql="and horario BETWEEN 1 AND 4";
			}
			if ($dato==10)
			{
				$sql="and horario BETWEEN 5 AND 8";
			}
			return $sql;
		}
}
?>