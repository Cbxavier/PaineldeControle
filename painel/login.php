<?php if (isset($_COOKIE['lembrar'])) {

		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE  user= ?  AND password = ?");
		$sql->execute(array($user, $password));

		if($sql->rowCount()==1){
			$info = $sql->fetch();
			$_SESSION['login'] = true;
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $password;
			$_SESSION['cargo'] = $info['cargo'];
			$_SESSION['nome'] = $info['nome'];
			$_SESSION['img'] = $info['img'];
			header('Location: '.INCLUDE_PATH_PAINEL);
			die();
		}
	}  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    

    <!--CSS-->
    <link href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css" rel="stylesheet" />

    <!--Fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">

    <!--Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


	<div class="box-login">
		<?php 
			if(isset($_POST['acao'])){
				$user = $_POST['user'];
				$password = $_POST['password'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE  user= ?  AND password = ?");
				$sql->execute(array($user, $password));

				if($sql->rowCount()==1){
					
					$info = $sql->fetch();
					$_SESSION['login'] = true;
					$_SESSION['user'] = $user;
					$_SESSION['password'] = $password;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['img'];

					if (isset($_POST['lembrar'])) {
						
						setcookie('lembrar', true, time()+(60*60*24), '/');
						setcookie('user',$user, time()+(60*60*24), '/');
						setcookie('password',$password, time()+(60*60*24), '/');
					}

					header('Location: '.INCLUDE_PATH_PAINEL);
					die();
				}else{
					echo '<div class ="box-erro"><i class="fa fa-times"></i> Usuário ou senha incorreto!</div>';
				}
			}
		?>
		<h2>Acessar Painel de Controle</h2>
		<form method="post">
			<input type="text" name="user" placeholder="Login" required>
			<input type="password" name="password" placeholder="Senha" required>
			<input type="submit" name="acao" value="Entrar">

			<div class="form-group-login right">
				<label>Lembrar-me</label>
				<input type="checkbox" name="lembrar">
			</div>
			<div class="clear"></div>
		</form>
	</div>
</body>
</html>