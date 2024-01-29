<?php 
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$categoria = Painel::select('tb_site.categorias','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
 ?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Categorias</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$slug = Painel::generateSlug($_POST['nome']);
				$arr = array_merge($_POST,array('slug'=>$slug));

				$verificar = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ? AND id != ?");
				$verificar->execute(array($_POST['nome'], $id));
				
				if ($verificar->rowCount() == 1) {
					Painel::alert('erro', 'Já existe uma categorias com esse nome');
				} else {

					if (Painel::Update($arr)) {
						Painel::alert('sucesso', 'Categoria atualizada com sucesso');
						$categoria = Painel::select('tb_site.categorias','id = ?',array($id));
					} else{
						Painel::alert('erro', 'Campos vazios não são permitidos');
					}
				}
				
			}
		?>


		<div class="form-group">
			<label>Nome da Categoria:</label>
			<input type="text" name="nome" value="<?php echo $categoria['nome'] ?>";>
		</div><!--form-group-->


		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="order_id" value="0">
			<input type="hidden" name="nome_tabela" value="tb_site.categorias" />
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form>



</div><!--box-content-->