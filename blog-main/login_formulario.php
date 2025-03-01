<!DOCTYPE html>
<html>
    <head>
        <litle>| Login | Projeto para Web com PHP</litle>
        <link rel="stylesheet"
            href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 'includes/topo.php'; ?>
                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12">
                    <?php include 'includes/menu.php'; ?>
                </div>
                <div class="col-md-10" style="padding-top: 50px;">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <!-- Formulario de login -->
                        <form method="post" action="core/usuario_repositorio.php">
                            <input type="hidden" name="acao" value="login">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="text"
                                    require="required" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input class="form-control" type="password"
                                    require="required" id="senha" name="senha">
                            </div>
                            <!-- Botao submit -->
                            <div class="text-right">
                                <button class="btn btn-sucess"
                                    type="submit">Acessar</button>
                            </div>
                        </form>
                    </div>
                </div>
           </div>
           <div class="row">
                <div class="col-md-12">
                    <?php
                        include 'includes/rodape.php';
                    ?>
                </div>
           </div>
        </div>
        <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
    </body>
</html>