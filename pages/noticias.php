<?php 
  $url = explode('/', $_GET['url']);
  if (!isset($url[2])) {
  
  $categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
  $categoria->execute(array(@$url[1]));
  $categoria = $categoria->fetch();

?>

<section class="header-noticias">
	<div class="center">
		<h2><i class="fa fa-bell-o" aria-hidden="true"></i></h2>
		<h2>Acompanhe as últimas notícias do portal</h2>
	</div>
</section>

<section class="container-portal">
	<div class="center">
		<div class="sidebar">
			<div class="box-content-sidebar">
				<h3><i class="fa fa-search"></i> Realizar uma busca: </h3>
				<form method="post">
					<input type="text" name="parametro" placeholder="O que deseja procurar?" required>
					<input type="submit" name="buscar" value="Procurar">
				</form> 
			</div> <!-- box-content-sidebar -->
			<div class="box-content-sidebar">
				<h3><i class="fa fa-list-ul"></i> Selecione a categoria: </h3>
				<form>
					<select name="categoria">
					<option value="" selected>Todas as categorias</option>
						<?php
						 $categorias = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` ORDER BY order_id");
						 $categorias->execute();
						 $categorias = $categorias->fetchAll();

						 foreach ($categorias as $key => $value) {
						
						?>
						<option <?php if(isset($url[1]) && $value['slug'] == $url[1]) echo 'selected';?> value="<?php echo $value['slug'] ?>"><?php echo $value['nome'];?></option>

						<?php }?>
					</select>
				</form> 
			</div> <!-- box-content-sidebar -->
			<div class="box-content-sidebar">
				<h3><i class="fa fa-user"></i> Sobre o autor: </h3>
				<div class="autor-box-portal">
					<div class="box-img-autor"></div>
					
					<div class="texto-autor-portal text-center">
						<?php  $infoSite =  Mysql::conectar()->prepare("SELECT * FROM `tb_site.config`");
							   $infoSite->execute(); 
							   $infoSite = $infoSite->fetch();?>
						<h3><?php  echo $infoSite['nome_autor']?></h3>
						<p><?php  echo substr($infoSite['descricao'], 0, 300)?>...</p>
					</div>
				</div> <!-- autor-box-portal -->
			</div> <!-- box-content-sidebar -->

		</div> <!-- sidebar -->

		<div class="conteudo-portal">

				<div class="header-conteudo-portal">

					<?php 
						$porPagina = 2;

						if (empty($categoria) || $categoria['nome'] == '') {
			           	 	echo '<h2>Visualizando Todos os Posts</h2>';
			        	} else {
			            	echo '<h2>Visualizando Posts em <span>' . $categoria['nome'] . '</span></h2>';
			        	}

						$query = "SELECT * FROM `tb_site.noticias` ";

						if (!empty($categoria) && $categoria['nome'] != '') {

							$categoria['id'] = (int)$categoria['id'];
							$query.=" WHERE categoria_id = $categoria[id]";
						}

						if (isset($_POST['parametro'])) {
							$busca = $_POST['parametro'];
							if (strstr($query, 'WHERE' ) !== false) {
								
								$busca = $_POST['parametro'];
								$query.=" AND titulo LIKE '%$busca%'";
							} else {
								$busca = $_POST['parametro'];
								$query.=" WHERE titulo LIKE '%$busca%'";
							}
						}

						$query2 = "SELECT * FROM `tb_site.noticias` ";
						

						if (isset($categoria['nome']) && $categoria['nome'] != '') {

							$categoria['id'] = (int)$categoria['id'];
							$query2.=" WHERE categoria_id = $categoria[id]";
						}

							if (isset($_POST['parametro'])) {
								$busca = $_POST['parametro'];
								if (strstr($query2, 'WHERE' ) !== false) {
									
									$busca = $_POST['parametro'];
									$query2.=" AND titulo LIKE '%$busca%'";
								} else {
									$busca = $_POST['parametro'];
									$query2.=" WHERE titulo LIKE '%$busca%'";
								}
							}
							$totalPaginasObj = Mysql::conectar()->prepare($query2);
							$totalPaginasObj->execute();
							$totalPaginas = ceil($totalPaginasObj->rowCount() / $porPagina);

						if (!isset($_POST['parametro'])) {
						

							if (isset($_GET['pagina'])) {
								$pagina = (int)$_GET['pagina'];
								if ($pagina > $totalPaginas) {
									$pagina = 1;
								}

								$queryPg = ($pagina-1)*$porPagina;
								$query.=" ORDER BY order_id ASC LIMIT $queryPg, $porPagina";
							} else {
								$pagina = 1;
								$query.=" ORDER BY order_id ASC LIMIT 0, $porPagina";
							} 
						} else {
							$query.=" ORDER BY order_id ASC ";
						}
						$sql = Mysql::conectar()->prepare($query);
						$sql->execute();
						$noticias = $sql->fetchAll();
					?>
					
					
				</div>

				<?php foreach ($noticias as $key => $value) {
					$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ?");
					$sql->execute(array($value['categoria_id']));
					$categoriaNome = $sql->fetch()['slug'];
				?>
				<div class="box-single-conteudo">
					
					<h2><?php echo date('d/m/Y',strtotime($value['data'])); ?> - <?php echo $value['titulo']; ?></h2>
					<p><?php echo substr(strip_tags($value['conteudo']), 0, 400); ?>...</p>
					<a href="<?php echo INCLUDE_PATH;?>noticias/<?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>">Leia mais</a>
				</div>

				<?php }  ?>

				<div class="paginator">
					<?php 
						if (!isset($_POST['parametro'])) {
							for($i = 1; $i <= $totalPaginas; $i++){
								$catStr = (isset($categoria['nome']) && $categoria['nome'] != '') ? '/'.$categoria['slug'] : '';
								if ($pagina == $i) {
									echo '<a class="active-page" href="'.INCLUDE_PATH.'noticias'.$catStr.'?pagina='.$i.'">'.$i.'</a>';
								} else {
									echo '<a href="'.INCLUDE_PATH.'noticias'.$catStr.'?pagina='.$i.'">'.$i.'</a>';
								}
							}
						}
						
					?>
				</div>

		</div>
		<div class="clear"></div>
	</div> <!-- center -->
</section>

<?php } else {
	include('noticias_single.php');
} 
?>