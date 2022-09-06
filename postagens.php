<?php require_once('inc/classes.php');
include_once('class/Conexao.php');
$Postagem = new Postagem();
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
            <h1> Postagens - <a class="btn btn-primary" href="<?php echo URL ?>cadastrar-postagens.php">Novo</a></h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Gostei</th>
                        <th>Não Gostei</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $postagem = $Postagem->listar();
                    foreach ($postagem as $postagem) {
                    ?>
                        <tr>
                            <td>
                                <a href="<?php echo URL ?>atualizar-postagem.php?id=<?php echo $postagem->id_postagem; ?>">Editar</a>
                                <a href="<?php echo URL ?>detalhes-postagem.php?id=<?php echo $postagem->id_postagem; ?>">Ver</a>
                                <a href="<?php echo URL ?>deletar-postagem.php?id=<?php echo $postagem->id_postagem; ?>">Deletar</a>
                            </td>
                            <td>
                                <?php echo $postagem->id_postagem; ?>
                            </td>
                            <td>
                                <?php echo $postagem->id_usuario; ?>
                            </td>
                            <td>
                                <?php echo $postagem->dt; ?>
                            </td>
                            <td>
                                <?php echo nl2br($postagem->descricao); ?>
                            </td>
                            <td>
                                <?php echo $postagem->gostei; ?>
                            </td>
                            <td>
                                <?php echo $postagem->nao_gostei; ?>
                            </td>
                        </tr>
                    <?php
                    } // fecha o foreach
                    ?>
                </tbody>
            </table>
        </div>
        <!--/Conteudo -->
        <!-- rodape -->
        <?php include_once('inc/rodape.php'); ?>
        <!-- /rodape -->
    </div>
</body>

</html>