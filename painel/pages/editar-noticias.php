<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$capa = Painel::select('tb_site.noticias','id = ?',array($id));
	}else{
		Painel::alert('erro', 'Você precisa passar o parametro ID.');
		die();
	}
?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Noticias</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.
				
				$titulo = $_POST['titulo'];
				$slug = Painel::generateSlug($titulo);
				$conteudo = $_POST['conteudo'];
				$capa = $_FILES['capa'];
				$capa_atual = $_POST['capa_atual'];

				

				$verifica = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ?  AND id != ?");
				$verifica->execute(array($titulo,$id));

				if($verifica->rowCount()== 0){

					if($capa['name'] != ''){

						//Existe o upload de imagem.
						if(Painel::imagemValida($capa)){
							Painel::deleteFile($capa_atual);
							$capa = Painel::uploadFile($capa);
							$slug = Painel::generateSlug($titulo);
							$arr = ['titulo'=>$titulo, 'data' => date('Y-m-d'), 'categoria_id' => $_POST['categoria_id'], '$conteudo'=>$conteudo, 'capa'=>$capa,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
							Painel::update($arr);
							$capa = Painel::select('tb_site.noticias','id = ?',array($id));
							Painel::alert('sucesso','A noticia foi editada junto com a imagem!');
						}else{
							Painel::alert('erro','O formato da imagem não é válido');
						}
					}else{
						$capa = $capa_atual;
						$arr = ['titulo'=>$titulo, 'categoria_id' => $_POST['categoria_id'], 'conteudo'=>$conteudo, 'capa'=>$capa, 'slug'=>$slug, 'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
						Painel::update($arr);
						$capa = Painel::select('tb_site.noticias','id = ?',array($id));
						Painel::alert('sucesso','Noticias editada com sucesso!');
					}
				}else{
					Painel::alert('erro', 'Já existe uma noticias com esse nome');
				}

			}
		?>

		<div class="form-group">
			<label>Titulo:</label>
			<input type="text" name="titulo" required value="<?php echo $capa['titulo']; ?>">
		</div><!--form-group-->
		<label>Categoria</label>
			<select name="categoria_id">
				<?php 
					$categorias = Painel::selectAll('tb_site.categorias');
					foreach ($categorias as $key => $value) {
				?>

				<option <?php if($value['id'] == @$_POST['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id']?>"><?php echo $value['nome']?></option>
				
				<?php } ?>
			</select>

		<div class="form-group">
			<label>Conteúdo</label>
			<textarea class="tinymce" name="conteudo"><?php echo $capa['conteudo']; ?></textarea>
		</div>

		<div class="form-group">
			<label>Capa</label>
			<input type="file" name="capa"/>
			<input type="hidden" name="capa_atual" value="<?php echo $capa['capa']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form>



</div><!--box-content-->