<?php 
verificaPermissaoPagina(2);


?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['cargo'];
				
				if ($login=='') {
					Painel::alert('erro', 'É necessário preencher o login');
				} else if($nome == ''){
					Painel::alert('erro', 'É necessário preencher o nome');
				} else if ($senha == ''){
					Painel::alert('erro', 'É necessário preencher a senha');
				}
				 else if ($cargo == ''){
					Painel::alert('erro', 'É necessário preencher o cargo');
				}  else if ($imagem['name'] == ''){
					Painel::alert('erro', 'É necessário selecionar a imagem');
				} else {
					if($cargo >= $_SESSION['cargo']){
						Painel::alert('erro', 'Selecione um cargo menor que o seu');
					} else if(Painel::imagemValida($imagem) == false){
						Painel::alert('erro', 'Selecione uma imagem válida');
					} else if(Usuario::userExists($login)){
						Painel::alert('erro', 'Esse login já está Cadastrado, insira outro Login');
					} else{
						$usuario = new Usuario();
						$imagem = Painel::uploadFile($imagem);
						$usuario->CadastrarUsuario($login, $nome, $senha, $imagem, $cargo);
						Painel::alert('sucesso', 'Cadastrado com sucesso');
					}
				}

			}
				
				
		?>

		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login">
		</div><!--form-group-->
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password">
		</div><!--form-group-->

		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
				<?php
					foreach (Painel::$cargos as $key => $value) {
						if($key < $_SESSION['cargo']){
							echo '<option value="'.$key.'">'.$value.'</option>';
						}
					}
				?>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem" />
			
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->