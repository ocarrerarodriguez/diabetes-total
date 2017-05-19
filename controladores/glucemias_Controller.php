<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of glucemias_Controller
 *
 * @author lacuato_ssd
 */
class glucemias_Controller extends cls_Controller{
	public function __construct($controlador,$metodo) {
        parent::__construct($controlador,$metodo);
        $_glucemias = $this->loadModel('glucemias');
        //cls_Session::tiempo();
    }
    
    public function index()
    {
		$_glucemias = $this->loadModel('glucemias');
		$_glucemias->table="glucemias";
		$sql="SELECT * FROM `".$_glucemias->table."` WHERE 1";
		$datos=$_glucemias::query($sql);
		for($i=0;$i<(count($datos));$i++)
		{
			$datos[$i]->fecha=$this->convertifecha($datos[$i]->time);
			$datos[$i]->hora= substr($datos[$i]->time,10);
			
		}
		$this->_view->titulo = 'Glucemias del Paciente:';
		$this->_view->datos=$datos;
		$this->_view->paciente="Oscar Carreira Rodriguez";
		$this->_view->renderizar('glucemias', 'glucemias',$this->_omenu->get_menu());
	} 
	function convertifecha($fecha)
	{
		return substr($fecha,8,2).'<span style="font-weight:bold;">/</span>'.substr($fecha,5,2).'<span style="font-weight:bold;">/</span>'. substr($fecha,0,4);
	}
}
?>