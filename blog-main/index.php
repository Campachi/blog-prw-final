<!DOCTYPE html>
<html>
    <head>
        <title> | Página inicial | Projeto para Web com PHP</title>
        <link rel="stylesheet"
              href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Topo //-->
                    <?php
                        include 'includes/topo.php';
                    ?>
                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12">
                    <!--Menu //-->
                    <?php
                        include 'includes/menu.php';
                    ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <!--Conteúdo //-->
                <h2>Página Inicial</h2>
                <?php
                    include 'includes/busca.php';
                ?>

                <?php
                    #Pega o horario atual de acordo com o fuso
                    date_default_timezone_set('America/Sao_Paulo'); #indica o loal e o fuso horario
                    require_once 'includes/funcoes.php';# inclui a pagia php funções
                    require_once 'core/conexao_mysql.php'; #inclui a conexão_mysql.php
                    require_once 'core/sql.php';
                    require_once 'core/mysql.php';

                    foreach($_GET as $indice => $dado) 
                    {
                        $$indice = limparDados($dado);
                    }

                    //Pega a data atual
                    $data_atual = date('Y-m-d H:i:s');
                    //Primeiro criterio para puxar o post na data correta
                    $criterio = [
                        ['data_postagem', '<=', $data_atual]
                    ];
                    
                    //Segundo criterio para puxar o post do tipo e titulo correto
                    if(!empty($busca)) 
                    {
                        $criterio[] = [
                            'AND',
                            'titulo',
                            'like',
                            "%{$busca}%"
                        ];
                    }
                    ////////
                    //funcao 'Buscar()'
                    $posts = buscar ('post', ['titulo', 'data_postagem', 'id', 
                    ' (select nome from usuario where usuario.id = post.usuario_id) as nome'], $criterio,
                    'data_postagem DESC');
                ?>

                <div>
                    <div class="list-group">
                        <?php
                            //MOSTRA OS POSTS DISPONIVEIS
                            #Puxa a data e horario e os formata 
                            foreach($posts as $post):
                                $data = date_create($post['data_postagem']);
                                $data = date_format($data, 'd/m/Y H:i:s');
                        ?>
                        <a class="list-group-item list-group-item-action"
                            href="post_detalhe.php?post=<?php echo $post['id']?>">
                            <strong><?php echo $post['titulo']?></strong>
                            [<?php echo $post['nome']?>]
                            <span class="badge badge-dark"><?php echo $data?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Rodapé //-->
                <?php
                    include 'includes/rodape.php';
                ?>
            </div>
        </div>
    </div>
    <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
    </body>
</html>