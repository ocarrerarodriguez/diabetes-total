<?php
$ruta='aplicacion'.DS.'LIB_core_svg.php';
require_once $ruta;
class graficos_svg
{
	public $svg ;
	public $height;
	public $width;
	public $datos;
	//constructor de la clase que inicializa las variables necesarias
	public function __construct($datos,$height=500,$width=720)
    {
		$this->svg= new core_svg($datos,$height,$width);
		$this->height=$height;
		$this->width=$width;
		$this->datos=$datos;
	}
	public function escala($color,$left,$down,$height,$width)
	{
		//linea vertical que separa la escala
		$this->svg->set_cadena($this->svg->line($left,0,$left,$height,$color ,1));
		//lineas de la escala
		for($i=0;$i<24;$i++)
		{
			$this->svg->set_cadena($this->svg->texto(0,$height-(20*$i+$down+3),$color,$i*20));
			$this->svg->set_cadena($this->svg->line(0,$height-(20*$i+$down),$left,$height-(20*$i+$down),$color,1));
		}
		for($i=0;$i<$height/100;$i++)
		{
			$this->svg->set_cadena($this->svg->line($left,$height-($i*100+$down),$width,$height-($i*100+$down),$color ,1));
		}
		
	}
	public function barras_dia($dia,$color,$left,$down,$height)
	{
		for($i=1;$i<$dia;$i++)
		{
		$this->svg->set_cadena($this->svg->line(1440*$i/($dia*2)+$left,0,1440*$i/($dia*2)+$left,$height-$down,$color ,1));
		}
		for($i=0;$i<$dia;$i++)
		{
			$this->svg->set_cadena($this->svg->texto(1440*$i/($dia*2)+$left+25,$height-($down-16),$color,"dia ".$i));
		}
	}
	public function rectangulos($left,$down,$height,$width)
	{
		$negro='7dcea0';  //455a64
		$red="d9534f";
		$yelow='f7dc6f';
		//$naranja='e67e22';
		//$blue="337ab7";
		$ancho=70;
		
		$this->svg->set_cadena($this->svg->rectangulo($left,0,$width-$left,$height-$ancho-$down,$negro,'none',0));
		$this->svg->set_cadena($this->svg->rectangulo($left,0,$width-$left,($height-300-$down),$yelow,'none',0));
		$this->svg->set_cadena($this->svg->rectangulo ($left,$height-$ancho-$down,$width-$left,$ancho,$red,'none',0));
	}
	public function renderizar($dia,$left,$down)
	{
		$gris='666666';
		//$verde='66FF00';
		$negro_glucemias='222222';

		$this->svg->set_cadena($this->svg->inicializar_svg($this->height,$this->width));
		$this->svg->set_cadena($this->rectangulos($left,$down,$this->height,$this->width));
		$this->svg->set_cadena($this->escala($gris,$left,$down,$this->height,$this->width));
		$this->svg->set_cadena($this->barras_dia($dia,$gris,$left,$down,$this->height));
		for($i=1;$i<count($this->datos);$i++)
		{
			$this->svg->set_cadena($this->svg->line(
					(($this->datos[$i-1]->valor_px)/($dia*2))+$left,
					$this->height-($this->datos[$i-1]->glucemias+$down),
					(($this->datos[$i]->valor_px)/($dia*2))+$left,
					$this->height-($this->datos[$i]->glucemias+$down),
					$negro_glucemias ,1));
		}	
		
		$this->svg->set_cadena($this->svg->finalizar_svg());
	}
	//funcion que debuelve la cadena de html para su posterior uso
	public function get_cadena()
	{
		return$this->svg->get_cadena();
	}
}
