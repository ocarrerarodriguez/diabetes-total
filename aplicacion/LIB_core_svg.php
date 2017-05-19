<?php
/**
 * Description of CLS_core_svg
 *
 * @author lacuato_ssd
 */
class core_svg {
	public $height;
	public $width;
	public $datos;
	public $cadena;
	//constructor de la clase que inicializa las variables necesarias
	public function __construct($datos,$height=0,$width=0)
    {
		$this->cadena="";
		$this->height=$height;
		$this->width=$width;
		$this->datos=$datos;
	}
	//funcion que coloca los encavezados de un grafico svg
	public function inicializar_svg($height=1,$width=1)
	{
		$cadena='<?xml version="1.0" encoding="utf-8"?>';
		$doctype='<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
		$svg_ini='<svg version="1.1" id="grafico" x="0px" y="0px" width="'.($width).'px" height="'.($height).'px" viewBox="0 0 '.$width.' '.$height.'" enable-background="new 0 0 '.$width.' '.$height.'" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';
		return $cadena."\n".$doctype."\n".$svg_ini."\n";
	}
	//funcion que dibuja rectangulosdentro del svg
	public function rectangulo($x=0,$y=0,$width=0,$height=0,$fcolor='000000',$scolor='000000',$swidth=1)
	{
		$inicio='<rect ';
		$parametros='x="'.$x.'" y="'.$y.'" width="'.$width.'" height="'.$height.'"';
		$estilos=' style="fill:#'.$fcolor.';stroke:'.$scolor.';stroke-width:'.$swidth.'"';
		$fin='/>';
		return("\t".$inicio.$parametros.$estilos.$fin."\n");
	}
	//funcion que dibuja lineas dentro del svg
	public function line($x1=0,$y1=0,$x2=0,$y2=0,$scolor='000000',$swidth=1)
	{
		$inicio='<line ';
		$sep='" ';
		$parametros='x1="'.$x1.$sep.'y1="'.$y1.$sep.'x2="'.$x2.$sep.'y2="'.$y2.$sep;  
		$estilos=' style="stroke:#'.$scolor.';stroke-width:'.$swidth.'"';
		$fin='/>';
		return("\t".$inicio.$parametros.$estilos.$fin."\n");
	}
	public function texto($x=0,$y=0,$scolor='000000',$text)
	{
		$inicio='<text ';
		$sep='" ';
		$parametros='x="'.$x.$sep.'y="'.$y.$sep;  
		
		$estilos=' style="fill : #'.$scolor.';"'.'>';
		$fin='</text>';
		//var_dump("\t".$inicio.$parametros.$estilos.$text.$fin."\n");
		return("\t".$inicio.$parametros.$estilos.$text.$fin."\n");
	}
	//funion que termina el elemento svg
	public function finalizar_svg()
	{
		return'</svg>'."\n";
	}
	//funcion que debuelve la cadena de html para su posterior uso
	public function set_cadena($cadena)
	{
		$this->cadena.=$cadena;
	}
	public function get_cadena()
	{
		return$this->cadena;
	}
}
