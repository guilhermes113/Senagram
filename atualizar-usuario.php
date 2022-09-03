<?php
require_once('inc/classes.php');
include_once('class/Conexao.php');
$Usuario = new Usuario();
if (isset($_POST['btnAtualizar'])) {
    $Usuario->atualizar($_POST);
    header('location:' . URL . 'usuarios.php');
}
//pegar os dados do usuario
$usuario = $Usuario->mostar($_GET['id']);
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
        <!-- Menu -->
        <div>
            <?php include('inc/menu.php'); ?>
        </div>
        <!--/Menu -->
        <!-- Conteudo-->
        <div>
            <h1>Atualizar de Usuario: <?php echo $usuario->nome; ?></h1>
            <form action="?" method="POST">
                <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario; ?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="nome">Nome*</label>
                        <input class="form-control" type="text" name="nome" id="nome" required value="<?php echo $usuario->nome; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="email">E-mail*</label>
                        <input class="form-control" type="email" name="email" id="email" required value="<?php echo $usuario->email; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="senha">Senha*</label>
                        <input class="form-control" type="password" name="senha" id="senha" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="confirmaSenha">Confirma Senha*</label>
                        <input class="form-control" type="password" name="confirmaSenha" id="confirmaSenha" required>
                    </div>
                    <div class="offset-11 col-md-1 mt-2">
                        <input type="submit" class="btn btn-success" value="atualizar" name="btnAtualizar">
                    </div>
                </div>
            </form>
        </div>
        <!--/Conteudo -->
        <!-- rodape -->
        <?php include_once('inc/rodape.php'); ?>
        <!-- /rodape -->
    </div>
</body>

</html>