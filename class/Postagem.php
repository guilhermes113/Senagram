<?php
class Postagem
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::conexao();
    }

    /**
     * listar postagens
     */

    public function listar()
    {
        // abrir a conexão com o BD,
        // Montar a consulta
        $sql = $this->pdo->prepare('SELECT * FROM postagens');
        // executar
        $sql->execute();
        // retornar os dados
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    public function cadastrar(array $dados = null)
    {
        $sql = $this->pdo->prepare(
            "INSERT INTO postagens
            (id_usuario,descricao,dt)
            VALUES
            (:id_usuario, :descricao, :dt)
            "
        );
        // TRATAR OS DADOS
        $id_usuario = ($dados['id_usuario']);
        $descricao = ($dados['descricao']);
        $dt = date('Y-m-d H:i');
        // ou      MESCLAR OS DADOS
        $sql->bindParam(':id_usuario', $id_usuario);
        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':dt', $dt);

        // EXECUTAR
        $sql->execute();

        return $this->pdo->lastInsertId();
    }
    public function atualizar(array $dados)
    {
        $sql = $this->pdo->prepare("UPDATE postagens SET descricao=:descricao,dt=:dt WHERE id_postagens = :id_postagens LIMIT 1");
        // TRATAR OS DADOS
        $descricao = ($dados['descricao']);
        $dt = date('Y-m-d H:i');
      
        // ou      MESCLAR OS DADOS
        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':dt',$dt);
        $sql->bindParam(':id_postagens', $dados['id_postagens']);

        // EXECUTAR
        $sql->execute();
    }
    public function deletar(int $id_postagem)
    {

        $sql = $this->pdo->prepare("DELETE FROM postagens WHERE id_postagem =:id_postagem");
        $sql->bindParam(':id_postagem', $id_postagem);
        $sql->execute();
    }
    public function mostar(int $id_postagem)
    {
        $sql = $this->pdo->prepare("SELECT * FROM postagens WHERE id_postagem = :id_postagem");
        $sql->bindParam(':id_postagem', $id_postagem);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }
    public function gostei(int $id_postagem)
    {
       $sql = $this->pdo->prepare('UPDATE postagens set gostei = gostei++ where id_postagem =:id_postagem');
       $sql->bindParam(':id_postagem',$id_postagem);
       $sql->execute();

    }
    public function nao_gostei(int $id_postagem)
    {
       $sql = $this->pdo->prepare('UPDATE postagens set nao_gostei = nao_gostei++ where id_postagem =:id_postagem');
       $sql->bindParam(':id_postagem',$id_postagem);
       $sql->execute();

    }
}
?>
