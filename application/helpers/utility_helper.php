<?php 
	function asset_url($url){
		return base_url().'assets/'.$url;
	}
	
	function num_random($numero)
	{
		$digitos = '';
		for($i = 0; $i < $numero; $i++){
		   $digitos .= mt_rand(0,9);
		}
		
		return $digitos;
	}
	
	function extension($str) 
	{
			return end(explode(".", $str));
	}
?>