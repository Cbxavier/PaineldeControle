<section class="banner-container">
    <?php 
        $sql = Mysql::conectar()->prepare('SELECT * FROM `tb_site.slides` ORDER BY `order_id` ASC LIMIT 4');
        $sql->execute();
        $slide =  $sql->fetchAll();
        foreach ($slide as $key => $value) {                      
                        
    ?>
    <div style="background-image: url('<?php echo INCLUDE_PATH_PAINEL; ?>/uploads/<?php echo $value['slide']?>');" class="banner-single"></div>
    <?php } ?>

    <div class="overlay"></div>
    <div class="center">

        <form class="ajax-form" method="post" action="">
            <h2>Seu melhor e-mail</h2>
            <input type="email" name="email" required="">
            <input type="hidden" name="identificador" value="form_home">
            <input type="submit" name="acao" value="Cadastrar">
        </form>
    </div>

    <div class="bullets">
        
    </div>
</section> <!-- Banner container -->

        <section class="descricao-autor">
            <div class="center">
                <div class="w100 left">
                    
                    <h2 class="text-center"><img src="<?php echo INCLUDE_PATH; ?>img/imagem1.jpeg"> <?php echo $infoSite['nome_autor']; ?></h2>

                    <p><?php echo $infoSite['descricao']; ?></p>
                </div>
                
                <div class="clear"></div>
            </div>
        </section>

        <section class="especialidades">
            
            <div class="center">
                <h2 class="title">Especialiades</h2>
                <div class="w33 left box-especialidade">
                    <h3><i class="<?php echo $infoSite['icone1']; ?>" aria-hidden="true"></i></h3>
                    <h4>CSS3</h4>
                    <p><?php echo $infoSite['descricao1']; ?></p>
                </div>
                <div class="w33 left box-especialidade">
                    <h3><i class="<?php echo $infoSite['icone2']; ?>" aria-hidden="true"></i></h3>
                    <h4>HTML5</h4>
                    <p><?php echo $infoSite['descricao2']; ?></p>
                </div>
                <div class="w33 left box-especialidade">
                    <h3><i class="<?php echo $infoSite['icone3']; ?>" aria-hidden="true"></i></h3>
                    <h4>PHP</h4>
                    <p><?php echo $infoSite['descricao3']; ?></p>
                </div>
                <div class="clear"></div>
            </div>
        </section>

        <section class="extras">
            <div class="center">
                <div id="depoimentos" class="w50 left depoimento-container">
                    <h2 class="title">Depoimento de nossos clientes</h2>
                    <?php 
                        $sql = Mysql::conectar()->prepare('SELECT * FROM `tb_site.depoimentos` ORDER BY `order_id` ASC LIMIT 3');
                        $sql->execute();
                        $depoimentos =  $sql->fetchAll();
                        foreach ($depoimentos as $key => $value) {
                          
                        
                    ?>
                        <div class="depoimento-simples">
                            <p class="depoimento-secao"><?php echo $value['depoimento'];  ?>
                            </p>
                            <p class="nome-autor"><?php echo $value['nome'];?> - <?php echo $value['data'];  ?></p>
                        </div>
                    <?php } ?>
                 
                </div>

                <div id="servicos" class="w50 left servico-container">
                    <h2 class="title">Serviços</h2>
                    <div class="servico">
                        
                        <ul>
                        <?php 
                            $sql = Mysql::conectar()->prepare('SELECT * FROM `tb_site.servicos` ORDER BY `order_id` ASC LIMIT 10');
                            $sql->execute();
                            $servicos =  $sql->fetchAll();
                            foreach ($servicos as $key => $value) {
                          
                        ?>
                            <li><?php echo $value['servico'];  ?></li>
                        <?php } ?>
        
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </section>
