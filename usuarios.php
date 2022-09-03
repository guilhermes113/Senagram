<?php require_once('inc/classes.php');
include_once('class/Conexao.php');
$Usuario = new Usuario();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senagram</title>
    <!-- css -->
    <?php require_once('inc/css.php'); ?>
    <!-- js -->
    <?php require_once('inc/js.php'); ?>
</head>

<body>
    <div class="container">
        <!-- MENU -->
        <?php
        require_once('inc/menu.php');
        ?>
        <!-- /MENU -->
        <!-- CONTEUDO -->
        <div>
            <h1> USUÁRIOS - <a class="btn btn-primary" href="<?php echo URL?>cadastrar-usuarious.php">Novo</a></h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usuarios = $Usuario->listar();
                    foreach ($usuarios as $usuario) {
                    ?>
                        <tr>
                            <td></td>
                            <td>
                                <?php echo $usuario->id_usuario; ?>
                            </td>
                            <td>
                                <?php echo $usuario->nome; ?>
                            </td>
                            <td>
                                <?php echo $usuario->email; ?>
                            </td>
                        </tr>
                    <?php
                    } // fecha o foreach
                    ?>
                </tbody>
            </table>
        </div>
        <!-- /CONTEUDO -->
        <!-- RODAPE -->
        <?php
        include_once('inc/rodape.php');
        ?>
        <!-- /RODAPE -->
    </div>
</body>

</html>