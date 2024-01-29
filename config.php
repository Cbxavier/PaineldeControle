<?php 
	
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);
	define('INCLUDE_PATH','http://localhost/ProjetoDC/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');

	//Definir constantes para conexão com o Banco de Dados
	define('HOST', 'localhost');
	define('DATABASE', 'projeto01');
	define('USER', 'root');
	define('PASSWORD', '');

	define('NOME_EMPRESA', 'Kaique Xavier');
	//Funções


	function pegaCargo($indice){

		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		$url = explode('/',@$_GET['url'])[0];
		if ($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if ($_SESSION['cargo'] >= $permissao) {
			return;
		} else {
			echo 'style="display:none;"';
		}
	}


	function verificaPermissaoPagina($permissao){
		if ($_SESSION['cargo'] >= $permissao) {
			return;
		} else {
			include('painel/pages/permissao-negada.php');
			die();
		}
	}

	function recoverPost($post){
		if (isset($_POST[$post])) {
			echo $_POST[$post];
		}
	}

	

?>