<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if (!function_exists('pass_cript')){
    function pass_cript($senha) {
      if(strlen($senha) >= 8 && strlen($senha) <= 12){
				if(pesquisa_alfanumerico($senha) && pesquisa_alfabetico($senha)) {
					$cost = '12';
          $salt = 'Cf1X11ePArKlBJomM0f6aJ';
          // Gera um hash baseado em bcrypt
          $senha = crypt($senha, '$2a$' . $cost. '$' . $salt . '$');
          return $senha;
        } else {
					return FALSE;
				}
      } else {
        return FALSE;
      }
    }
  }
