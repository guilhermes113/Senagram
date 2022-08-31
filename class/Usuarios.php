<?php
    class Usuario extends Conexao
    {
        public $pdo;

        public function __construct()
        {
          $this->pdo = Conexao::conexao();   
        }
        public function listar()
        {
            $sql = $this->pdo->prepare('SELECT * FROM usuarios');
            $sql->execute();

            return $sql->fetchAll();
        }
    }

?>