<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
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
    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
                <?php
                    if($_SESSION['img'] == ''){

                ?>
                    <div class="avatar-usuario">
                        <i class="fa fa-user"></i>
                    </div>
                    <?php } else{ ?>

                        <div class="imagem-usuario">
                            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" >
                        </div>

                    <?php }?>
                
                <div class="nome-usuario">
                    <p><?php echo $_SESSION['nome'];?></p>
                    <p><?php echo pegaCargo($_SESSION['cargo']);?></p>
                </div>
                <div class="items-menu">
                    <h2>Estatísticas</h2>
                    <a <?php selecionadoMenu(''); ?> href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa fa-home"></i> Inicio</a>
                    <h2>Cadastro</h2>
                    <a <?php selecionadoMenu('cadastrar-depoimento'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar depoimentos</a>
                    <a <?php selecionadoMenu('cadastrar-servico'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servico">Cadastrar serviços</a>
                    <a <?php selecionadoMenu('cadastrar-slide'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slide">Cadastrar Slides</a>
                    <h2>Gestão</h2>
                    <a <?php selecionadoMenu('listar-depoimento'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimento">Listar depoimentos</a>
                    <a <?php selecionadoMenu('listar-servico'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servico">Listar serviços</a>
                    <a <?php selecionadoMenu('listar-slide'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slide">Listar Slides</a>
                    <h2>Administração</h2>
                    <a <?php selecionadoMenu('editar-usuario'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
                    <a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
                    <h2>Configuração Geral</h2>
                    <a <?php selecionadoMenu('editar-site'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site">Editar</a>
                    <h2>Gestão de noticias</h2>
                    <a <?php selecionadoMenu('cadastrar-categorias'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-categorias">Cadastrar Categorias</a>
                    <a <?php selecionadoMenu('gerenciar-categorias'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias">Gerenciar Categorias</a>
                    <a <?php selecionadoMenu('cadastrar-noticia'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-noticia">Cadastrar Noticias</a>
                    <a <?php selecionadoMenu('gerenciar-noticias'); ?>href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias">Gerenciar Noticias</a>
                    
                </div><!--items-menu-->

            </div>
        </div>
    </div>

    
        <header>
            <div class="center">
                <div class="menu-btn">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="loggout">
                    <a  <?php if(@$_GET['url'] ==''){ ?> style="background: #60727a; padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa fa-home"></i> Página Inicial</a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout"><i class="fa fa-window-close"></i> <span>Sair </span></a>
                    
                </div> <!-- Loggout -->

                <div class="clear"></div>
            </div>
            
        </header>
        <div class="content">
           
        <?php Painel::carregarPagina();?>
            

        </div> <!-- content -->
    <script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.mask.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'.tinymce'});</script> -->

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/sp93hxiwl4psyjohtnk0ambabtyhtx8d2uhffmgt79up0vt3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
      tinymce.init({
        selector: '.tinymce',
        plugins: "image",
        height: 300,
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
      });

    </script>
    </body>
</html>