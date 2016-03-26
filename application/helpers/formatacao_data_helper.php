<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	if (!function_exists('formato_data_tempo')){
	 	function formato_data_tempo($data){
	 		$obj_data = new DateTime($data);
	 		$formato_data_tempo = $obj_data->format('d/m/Y H:i');
	 		return $formato_data_tempo;
	 	}
	}

	//	Tratamento de Datas
	if (!function_exists('formato_data_padrao')){
	 	function formato_data_padrao($data){
	 		$obj_data = new DateTime($data);
	 		$formato_data_padrao = $obj_data->format('Y-m-d');
	 		return $formato_data_padrao;
	 	}
	}
	if (!function_exists('formato_data')){
	 	function formato_data($data){
	 		$obj_data = new DateTime($data);
	 		$formato_data = $obj_data->format('d/m/Y');
	 		return $formato_data;
	 	}
	}
 	if (!function_exists('formato_dia')){
	 	function formato_dia($data){
	 		$obj_data = new DateTime($data);
	 		$formato_dia = $obj_data->format('d');
	 		return $formato_dia;
	 	}
 	}
 	if (!function_exists('formato_mes')){
	 	function formato_mes($data){
	 		$obj_data = new DateTime($data);
	 		$formato_mes = $obj_data->format('m');
	 		return $formato_mes;
	 	}
 	}
 	if (!function_exists('formato_ano')){
	 	function formato_ano($data){
	 		$obj_data = new DateTime($data);
	 		$formato_ano = $obj_data->format('Y');
	 		return $formato_ano;
	 	}
 	}

 	// Tratamento de Tempo
	if (!function_exists('formato_tempo')){
	 	function formato_tempo($data){
	 		$obj_data = new DateTime($data);
	 		$formato_tempo = $obj_data->format('H:i:s');
	 		return $formato_tempo;
	 	}
 	}
 	if (!function_exists('formato_hora_minuto')){
	 	function formato_hora_minuto($data){
	 		$obj_data = new DateTime($data);
	 		$formato_hora_minuto = $obj_data->format('H:i');
	 		return $formato_hora_minuto;
	 	}
 	}
 	if (!function_exists('formato_hora')){
	 	function formato_hora($data){
	 		$obj_data = new DateTime($data);
	 		$formato_hora = $obj_data->format('H');
	 		return $formato_hora;
	 	}
 	}
 	if (!function_exists('formato_minuto')){
	 	function formato_minuto($data){
	 		$obj_data = new DateTime($data);
	 		$formato_minuto = $obj_data->format('i');
	 		return $formato_minuto;
	 	}
 	}

 	if (!function_exists('transNomeDiaPtBr')){
	 	function transNomeDiaPtBr($dia){
	 		$nomeDia = array(
        'Sun' => 'dom',
        'Mon' => 'seg',
        'Tue' => 'ter',
        'Wed' => 'qua',
        'Thu' => 'qui',
        'Fri' => 'sex',
        'Sat' => 'sab',
      );
	 		return $nomeDia[$dia];
	 	}
	}

	if (!function_exists('transNomeMesPtBr')){
	 	function transNomeMesPtBr($mes){
	 		$nomeMes = array(
        'January' => 'Janeiro',
        'February' => 'Fevereiro',
        'March' => 'Março',
        'April' => 'Abril',
        'May' => 'Maio',
        'June' => 'Junho',
        'July' => 'Julho',
        'August' => 'Agosto',
        'September' => 'Setembro',
        'October' => 'Outubro',
        'November' => 'Novembro',
        'December' => 'Dezembro'
      );
	 		return $nomeMes[$mes];
	 	}
	}

 	

?>
