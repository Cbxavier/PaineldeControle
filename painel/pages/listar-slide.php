<?php
	
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = MySql::conectar()->prepare("SELECT slide FROM `tb_site.slides` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));

		$imagem = $selectImagem->fetch()['slide'];
		Painel::deleteFile($imagem);
		Painel::deletar('tb_site.slides',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slide');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.slides',$_GET['order'],$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 5;
	
	$slides = Painel::selectAll('tb_site.slides',($paginaAtual - 1) * $porPagina,$porPagina);
	
?>
<div class="box-content">
	<h2><i class="fa fa-id-card-o"></i> Listar Slides</h2>
	<div class="wraper-table">
	<table>

		<tr>
			<td>Nome</td>
			<td>Imagem</td>
			<td>Editar</td>
			<td>Deletar</td>
			<td>Cima</td>
			<td>baixo</td>
		</tr>

		<?php 

			foreach ($slides as $key => $value) {
				
		?>
			<tr>
				<td><?php echo $value['nome'];?></td>
				<td><img style="width: 50px; height: 50px;" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['slide'];?>"></td>
				<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-slide?id=<?php echo $value['id'];?>"><i class="fa fa-pencil"></i> Editar</a></td>
				<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slide?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>
				<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slide?order=up&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-up"></i></a></td>
				<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slide?order=down&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-down"></i></a></td>
			</tr>
		<?php }?>

	</table>
	</div>

	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('tb_site.slides')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slide?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slide?pagina='.$i.'">'.$i.'</a>';
			}

		?>
	</div><!--paginacao-->


</div>