<?php 
    include('config.php');
?>

<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador();?>
<?php 
    $infoSite = Mysql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();
?>

<!DOCTYPE html>
<html>
    <head>

        <!--Tags Metas-->
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <meta name="description" content="palavra, chave">
        <meta name="keyworks" content="palavra">
        <title><?php echo $infoSite['titulo']?></title>

        <!--CSS-->
        <link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet" />

        <!--Fontes-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">

        <!--Icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body> 

    <base base="<?php echo INCLUDE_PATH; ?>" />
    <?php 
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        switch ($url) {
            case 'depoimentos':
                echo '<target target="depoimentos" />';
            break;

            case 'servicos':
                echo '<target target="servicos" />';
            break;
        }
    ?>

    <div class="sucesso">Formulário enviado com sucesso</div>
    <div class="erro">Erro ao enviar formulário</div>
    <div class="overlay-loading"> 
        <img src="<?php echo INCLUDE_PATH; ?>img/loading.gif">
    </div>
    
    <header>
        <div class="center">
            <div class="logo left"><<a href="">Kaique Xavier /></a></div>
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH;?>">Inicio</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>noticias">Notícias</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="btn-menu-mobile">
                    <i class="fa fa-bars" aria-hidden="true" ></i>
                </div>
                <ul>
                   <li><a href="<?php echo INCLUDE_PATH;?>">Inicio</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH;?>noticias">Notícias</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>

    </header>

       
       <div class="container-principal">
            <?php 
                
                if(file_exists('pages/'.$url.'.php')){
                    include('pages/'.$url.'.php');
                }else{
                    if($url != 'depoimentos' && $url != 'servicos'){
                       
                        $urlPar = explode('/', $url)[0];

                        if ($urlPar == 'noticias') {
                            include('pages/noticias.php');
                        }else {
                            $pagina404 = true;
                            include('pages/404.php');
                        }
                    }else{ 
                        include('pages/home.php');
                    }
                }
            ?>
        </div>
        
        <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
            <div class="center">
                <p>Todos os direitos reservados</p>
            </div><!--center-->
        </footer>


        <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4&callback=Function.prototype'></script>

        <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>


        <?php
            if($url == 'home' || $url == ''){
        ?>
        <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
        <?php } ?>

        <?php if (isset($url) && is_array($url) && in_array('noticias', $url)) {
           
        ?>

        <script>
        $(document).ready(function() {
            $('select[name="categoria"]').change(function() {
                var selectedCategory = $(this).val();
                if (selectedCategory) {
                    location.href = "<?php echo INCLUDE_PATH; ?>noticias/" + selectedCategory;
                }
            });
        });
        </script>

        <?php  } ?>
        

        <?php
            if($url == 'contato'){
        ?>
        <?php } ?>
        
    </body>
</html>
