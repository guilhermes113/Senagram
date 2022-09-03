<?php

class Usuario extends Conexao
{
   public $pdo;

   public function __construct()
   {
      $this->pdo = Conexao::conexao();
   }

   /**
    * listar usuários
    */

   public function listar()
   {
      // abrir a conexão com o BD,
      // Montar a consulta
      $sql = $this->pdo->prepare('SELECT * FROM usuarios');
      // executar
      $sql->execute();
      // retornar os dados
      return $sql->fetchAll(PDO::FETCH_OBJ);
   }
   public function cadastrar(array $dados = null)
   {
      $sql = $this->pdo->prepare(
         "INSERT INTO usuarios
            (nome,email,senha)
            VALUES
            (:nome, :email, :senha)
            "
      );
      // TRATAR OS DADOS
      $nome = trim(strtoupper($dados['nome']));
      $email = trim(strtolower($dados['email']));
      $senha = md5($dados['senha']);
      // ou      MESCLAR OS DADOS
      $sql->bindParam(':nome', $nome);
      $sql->bindParam(':email', $email);
      $sql->bindParam(':senha', $senha);

      // EXECUTAR
      $sql->execute();

      return $this->pdo->lastInsertId();
   }
   public function atualizar(array $dados)
   {
      $sql = $this->pdo->prepare("UPDATE usuarios SET nome=:nome,email=:email,senha=:senha WHERE id_usuario = :id_usuario LIMIT 1");
      // TRATAR OS DADOS
      $nome = trim(strtoupper($dados['nome']));
      $email = trim(strtolower($dados['email']));
      $senha = md5($dados['senha']);
      // ou      MESCLAR OS DADOS
      $sql->bindParam(':nome', $nome);
      $sql->bindParam(':email', $email);
      $sql->bindParam(':senha', $senha);
      $sql->bindParam(':id_usuario', $dados['id_usuario']);

      // EXECUTAR
      $sql->execute();
   }
   public function deletar(int $id_usuario)
   {
      $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id_usuario =:id_usuario");
      $sql->bindParam(':id_usuario',$id_usuario);
      $sql->execute();
   }
   public function mostar(int $id_usuario)
   {
      $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
      $sql->bindParam(':id_usuario',$id_usuario);
      $sql->execute();
      return $sql->fetch(PDO::FETCH_OBJ);
      
   }

}
