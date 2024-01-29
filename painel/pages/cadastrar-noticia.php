
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Noticia</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){

				$categoria_id = $_POST['categoria_id'];
				$titulo = $_POST['titulo'];
				$conteudo = $_POST['conteudo'];
				$capa = $_FILES['capa'];
				

				if ($titulo == '' || $conteudo === '') {
					Painel::alert('erro', 'Campos vazios não são permitidos');
				}else if($capa['tmp_name'] == ''){
					Painel::alert('erro', 'A imagem de capa precisa ser selecionada');
				} else {
					if (Painel::imagemValida($capa)) {
						$imagem = Painel::uploadFile($capa);
						$slug = Painel::generateSlug($titulo);
						$arr = ['categoria_id' => $categoria_id, 'data'=> date('Y-m-d'), 'titulo'=>$titulo,
						'conteudo'=>$conteudo, 'capa'=>$imagem, 'slug'=>$slug, 'order_id'=>0,
						'nome_tabela'=>'tb_site.noticias'
						];

						if (Painel::insert($arr)) {
							Painel::alert('sucesso', 'Cadastrado com sucesso');
						} 
					} else {
						Painel::alert('erro', 'Selecione uma imagem válida');
					}
					
				}

			}	
				
		?>

		<div class="form-group">
			<label>Categoria</label>
			<select name="categoria_id">
				<?php 
					$categorias = Painel::selectAll('tb_site.categorias');
					foreach ($categorias as $key => $value) {
				?>

				<option <?php if($value['id'] == @$_POST['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id']?>"><?php echo $value['nome']?></option>
				
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label>Titulo</label>
			<input type="text" name="titulo" value="<?php recoverPost('titulo') ?>" />
			
		</div><!--form-group-->

		<div class="form-group">
			<label>Conteúdo</label>
			<textarea class="tinymce" name="conteudo"><?php recoverPost('conteudo') ?></textarea>
		</div>

		<div class="form-group">
			<label>Imagem de capa</label>
			<input type="file" name="capa" />
			
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="order_id" value="0">
			<input type="hidden" name="nome_tabela" value="tb_site.noticias" />
			<input type="submit" name="acao" value="Cadastrar">
		</div><!--form-group-->

	</form>



</div><!--box-content-->